<?php

namespace App\Http\Controllers;

use App\Models\Curriculum_Educational_Experiences;
use League\Csv\Reader;
use App\Models\EducationalExperience;
use App\Models\CurriculumEducationalExperience;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CurriculumDetailsController extends Controller
{
    public function index(Request $request)
    {
        $curriculumCode = $request->get('curriculumCode');
        $curriculum = DB::table('curriculums')->where('code', $curriculumCode)->first();
        $educationExperiencesList = DB::table('educational_experiences')
            ->join('curriculum_educational_experiences', 'educational_experiences.code', '=', 'curriculum_educational_experiences.ee_code')
            ->where('curriculum_educational_experiences.curriculum_code', $curriculumCode)
            ->select('educational_experiences.code', 'educational_experiences.name', 'educational_experiences.hours')
            ->paginate(10)
            ->withQueryString();

        return view('curriculumDetails.index', compact('educationExperiencesList', 'curriculum'));
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'curriculum_code' => 'required|string',
            'ee_code' => 'required|string',
        ]);

        // Crear la relación en la base de datos
        $curriculum_ee = new Curriculum_Educational_Experiences([
            'ee_code' => $request->ee_code,
            'curriculum_code' => $request->curriculum_code,
        ]);

        $curriculum_ee->save();

        return redirect()->route('curriculumDetails.index');
    }

    public function destroy($ee_code, $curriculum_code)
    {
        $curriculum_ee = Curriculum_Educational_Experiences::where('curriculum_code' == $curriculum_code && 'ee_code' == $ee_code);
        $curriculum_ee->delete();

        $user = Auth::user();
        $data = "Eliminación de la ee: $curriculum_ee->code del plan de estudios con el id:  $curriculum_code";
        event(new LogUserActivity($user,"Eliminación de la ee: $curriculum_ee->code del plan de estudios con el id:  $curriculum_code",$data));

        return redirect()->route('curriculumDetails.index');
    }

    public function uploadCsv(Request $request)
    {
        $validated = $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:20480',
        ]);

        try {
            if ($file = $request->file('csv_file')) {
                $csvData = file_get_contents($file);
                $rows = array_map('str_getcsv', explode("\n", $csvData));
                $header = array_shift($rows);

                foreach ($rows as $row) {
                    if (count($row) == count($header)) {
                        $data = array_combine($header, $row);
                        $curriculum_code = $request->curriculum_code;
                        $ee_code = $data['MATCUR'] ?? null;

                        $educationalExperience = EducationalExperience::firstOrCreate(
                            ['code' => $ee_code],
                            ['name' => $data['TEXG'] ?? null,
                            'hours' => $data['HRS'] ?? null]
                        );

                        $relationExists = Curriculum_Educational_Experiences::where('curriculum_code', $curriculum_code)
                            ->where('ee_code', $ee_code)
                            ->exists();

                        if (!$relationExists) {
                            $request->merge([
                                'curriculum_code' => $curriculum_code,
                                'ee_code' => $ee_code
                            ]);

                            $this->store($request);
                        }
                    }
                }
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error')->with('error_message', $e->getMessage());
        }
    }
}

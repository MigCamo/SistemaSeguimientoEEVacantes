<?php

namespace App\Http\Controllers;

use App\Models\Curriculum_Educational_Experiences;
use App\Http\Requests\StoreCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Models\Curriculum;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Svg\Tag\Circle;

class CurriculumController extends Controller
{
    public function index(Request $request)
    {

        $search = trim($request->get('search'));
        $radioButton = $request->get('tipo', 'code');

        $validColumns = ['code', 'year'];
        $orderColumn = in_array($radioButton, $validColumns) ? $radioButton : 'code';

        $programCode = $request->get('programCode');
        $program = DB::table('educational_programs')->where('program_code', $programCode)->first();

        if (!$program) {
            return redirect()->back()->with('error', 'El programa no existe');
        }

        $curriculumList = DB::table('curriculums')
            ->select('code', 'year', 'active', 'numberPeriods', 'minimumCredits', 'type')
            ->where('educational_programs_code', $programCode)
            ->where(function ($query) use ($search) {
                $query->where('code', 'LIKE', '%' . $search . '%')
                    ->orWhere('year', 'LIKE', '%' . $search . '%')
                    ->orWhere('type', 'LIKE', '%' . $search . '%');
            })
            ->orderBy($orderColumn, 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('curriculum.index', compact('curriculumList', 'search', 'program'));
    }


    public function store(StoreCurriculumRequest $request)
    {
        $curriculum = new Curriculum();
        $curriculum->code = $request->code;
        $curriculum->year = $request->year;
        $curriculum->educational_programs_code = $request->educational_programs_code;
        $curriculum->active = 0;
        $curriculum->numberPeriods = $request->numberPeriods;
        $curriculum->minimumCredits = $request->minimumCredits;
        $curriculum->type = $request->type;
        $curriculum->save();
        return redirect()->route('curriculum.index');
    }

    public function update(UpdateCurriculumRequest $request, $code)
    {
        $curriculum = Curriculum::findOrFail($code);
        $curriculum->update([
            'code' => $request->code,
            'year' => $request->year,
            'active' => 0,
            'numberPeriods' => $request->numberPeriods,
            'minimumCredits' => $request->minimumCredits,
            'type' => $request->type,
        ]);

        $user = Auth::user();
        $data = $request->code ." ". $request->names ." ". $request->lastname ." ". $request->maternal_surname ." ".$request->email;
        event(new LogUserActivity($user,"Actualización de plan de estudios ID: $request->code",$data));

        return redirect()->route('curriculum.index');
    }

    public function destroy($code)
    {
        $curriculum = Curriculum::findOrFail($code);
        $curriculum->delete();

        $user = Auth::user();
        $data = "Eliminación de Docente ID: $curriculum->code";
        event(new LogUserActivity($user,"Eliminación de curriculum ID: $curriculum->code",$data));

        return redirect()->route('curriculum.index');
    }

    public function updateStatus($code)
    {
        $curriculum = Curriculum::where('code', $code)->firstOrFail();

        if ($curriculum->active == false) {

            $curriculum->update([
                'active' => true,
            ]);

        } else {

            $curriculum->update([
                'active' => false,
            ]);

        }

        $user = Auth::user();
        $data = $curriculum->period_number . " " . $curriculum->description;
        return redirect()->route('curriculum.index');
    }

    public function goToCurriculumDetailsWindow($code)
    {
        return redirect()->route('curriculumDetails.index', ['curriculumCode' => $code]);
    }
}

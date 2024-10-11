<?php

namespace App\Http\Controllers;

use App\Models\Regions_Departament_Programs;
use App\Models\Curriculum;
use App\Models\Departament;
use App\Models\EducationalProgram;
use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreEducationalProgramRequest;
use App\Http\Requests\UpdateEducationalProgramsRequest;
use App\Providers\LogUserActivity;


class EducationalProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));

        $educationalProgramList = DB::table('regions_educational_programs as rep')
            ->join('regions as r', 'r.code', '=', 'rep.region_code')
            ->join('departaments as fe', 'fe.code', '=', 'rep.departament_code')
            ->join('educational_programs as ep', 'ep.program_code', '=', 'rep.educational_program_code')
            ->select(
                'rep.id',
                'r.code as regionCode',
                'r.name as regionName',
                'fe.code as departamentCode',
                'fe.name as departamentName',
                'ep.program_code as programCode',
                'ep.name as programName',
                'ep.initialhours as initialhours',
                'ep.usedhours as usedhours',
                'ep.availablehours as availablehours'
            )
            ->where(function ($query) use ($search) {
                $query->where('r.code', 'LIKE', '%'.$search.'%')
                    ->orWhere('r.name', 'LIKE', '%'.$search.'%')
                    ->orWhere('fe.code', 'LIKE', '%'.$search.'%')
                    ->orWhere('fe.name', 'LIKE', '%'.$search.'%')
                    ->orWhere('ep.program_code', 'LIKE', '%'.$search.'%')
                    ->orWhere('ep.name', 'LIKE', '%'.$search.'%')
                    ->orWhere('ep.initialhours', 'LIKE', '%'.$search.'%')
                    ->orWhere('ep.usedhours', 'LIKE', '%'.$search.'%')
                    ->orWhere('ep.availablehours', 'LIKE', '%'.$search.'%');
            })
            ->orderBy('r.code', 'asc')
            ->paginate(15)
            ->withQueryString();

        return view('educationalPrograms.index', compact('educationalProgramList', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::distinct('code')->get();
        $regionsList = $regions->unique('code');

        $user = auth()->user();

        return view('educationalPrograms.create',
            [
                'user' => $user,
                'regionList' => $regionsList,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEducationalProgramRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEducationalProgramRequest $request)
    {
        $region = explode("~",$request->regionCode);
        $departament = explode("~",$request->departamentCode);

        $educationalProgram = new EducationalProgram([
            'program_code' => $request->program_code,
            'name' => $request->name,
            'initialhours' => $request->initialhours,
            'usedhours' => $request->usedhours,
            'availablehours' => $request->initialhours - $request->usedhours,
        ]);
        $educationalProgram->save();

        $regionsDepartamentsPrograms = new Regions_Departament_Programs([
            'region_code' => $region[0],
            'departament_code' => $departament[0],
            'educational_program_code' => $request->program_code
        ]);
        $regionsDepartamentsPrograms->save();

        $user = Auth::user();
        $data = $request->regionCode." ".$request->departamentCode." ".$request->program_code ." ". $request->name ." ". $request->initialhours ." ". $request->usedHours ." ". $request->availablehours;
        event(new LogUserActivity($user,"Creación de Programa Educativo",$data));

        return redirect()->route('educationalPrograms.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationalProgram $program
     * @return \Illuminate\Http\Response
     */
    public function edit($program_code)
    {
        $regionList = Region::all();
        $program = EducationalProgram::where('program_code',$program_code)->firstOrFail();

        $regions_educational_programs = Regions_Departament_Programs::where('educational_program_code', $program_code)->firstOrFail();

        $departamentsSelected =  Departament::where('code', $regions_educational_programs->departament_code)->firstOrFail();

        $departamentList = Departament::join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->where('regions_departaments.region_code', $regions_educational_programs->region_code)
            ->get(['departaments.code', 'departaments.name']);
        $regionSelected = Region::where('code', $regions_educational_programs->region_code)->firstOrFail();

        return view('educationalPrograms.edit',
        ['program' => $program,
                'regionList' => $regionList,
                'departamentsSelected' => $departamentsSelected,
                'regionSelected' => $regionSelected,
                'departamentList' => $departamentList,
              ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEducationalProgramsRequest  $request
     * @param  \App\Models\EducationalProgram  $program
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEducationalProgramsRequest $request, $program_code)
    {
        $educationalProgram = EducationalProgram::where('program_code', $program_code)->firstOrFail();
        $regionsDepartamentsPrograms = Regions_Departament_Programs::where('educational_program_code', $program_code)->firstOrFail();
        $region = explode("~",$request->regionCode);
        $departament = explode("~",$request->departamentCode);

        $educationalProgram->update([
            'program_code' => $request->program_code,
            'name' => $request->name,
            'initialhours' => $request->initialhours,
            'usedhours' => $request->usedhours,
            'availablehours' => $request->initialhours - $request->usedhours,
        ]);
        $educationalProgram->save();

        $regionsDepartamentsPrograms->update([
            'region_code' => $region[0],
            'departament_code' => $departament[0],
            'educational_program_code' => $request->program_code
        ]);
        $regionsDepartamentsPrograms->save();

        $user = Auth::user();
        $data = $request->regionCode." ".$request->departamentCode." ".$request->program_code ." ". $request->name ." ". $request->initialhours ." ". $request->usedHours ." ". $request->availablehours;
        event(new LogUserActivity($user,"Actualización del programa educativo Clave: $request->clave_programa",$data));

        return redirect()->route('educationalPrograms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationalProgram  $educationalProgram
     * @return \Illuminate\Http\Response
     */
    public function destroy($program_code)
    {
        $curriculumList = Curriculum::where('educational_programs_code', $program_code)->get();
        foreach ($curriculumList as $curriculum) {
            $curriculum->delete();
        }

        $aux = Regions_Departament_Programs::where('educational_program_code', $program_code)->get();
        foreach ($aux as $item) {
            $item->delete();
        }

        $educationalProgram = EducationalProgram::findOrFail($program_code);
        $educationalProgram->delete();

        $user = Auth::user();
        $data = "Eliminación del programa educativo ID: $program_code";
        event(new LogUserActivity($user,"Eliminación de programa educativo ID: $program_code",$data));

        return redirect()->route('educationalPrograms.index');
    }

    public static function consultaDependencias($program_code){
        $data['departments'] = Departament::join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->where('regions_departaments.region_code', $program_code)
            ->get(['departaments.code', 'departaments.name']);

        return response()->json($data);
    }

    public function fetchRegionDepartments(Request $request)
    {
        $data['departments'] = Departament::join('regions_departaments', 'departaments.code', '=', 'regions_departaments.departament_code')
            ->where('regions_departaments.region_code', $request->regionCode)
            ->get(['departaments.code', 'departaments.name']);

        return response()->json($data);
    }

    public function viewEducationalPlans($code)
    {
        return redirect()->route('curriculum.index', ['programCode' => $code]);
    }

}

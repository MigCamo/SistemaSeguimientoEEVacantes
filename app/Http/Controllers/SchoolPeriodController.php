<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolPeriodRequest;
use App\Http\Requests\UpdateSchoolPeriodRequest;
use App\Models\SchoolPeriod;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SchoolPeriodController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $radioButton = $request->get('tipo') ?? 'period_number';

        $query = DB::table('school_Periods')
            ->select('code', 'period_number', 'description', 'current', 'created_at', 'updated_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('period_number', 'LIKE', '%' . $search . '%')
                ->orWhere('code', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%');
            });
        }

        switch ($radioButton) {
            case 'code':
                $query->orderBy('code', 'desc');
                break;
            case 'description':
                $query->orderBy('description', 'desc');
                break;
            default:
                $query->orderBy('period_number', 'desc');
                break;
        }

        $schoolPeriods = $query->paginate(10)->withQueryString();
        return view('schoolPeriod.index', compact('schoolPeriods', 'search'));
    }

    public function create()
    {
        return view ('schoolPeriod.create');
    }

    public function store(StoreSchoolPeriodRequest $request)
    {
        $schoolPeriod = new SchoolPeriod();
        $schoolPeriod->period_number = $request->period_number;
        $schoolPeriod->code = $request->code;
        $schoolPeriod->description = $request->description;
        $schoolPeriod->current = false;
        $schoolPeriod->save();

        $user = Auth::user();
        $data = $request->period_number ." ". $request->code ." ". $request->description . " ";
        event(new LogUserActivity($user,"Creación de Periodo",$data));

        return redirect()->route('schoolPeriod.index');
    }

    public function edit($code)
    {
        $schoolPeriod = SchoolPeriod::where('code',$code)->firstOrFail();
        return view('schoolPeriod.edit', compact('schoolPeriod'));
    }

    public function update(UpdateSchoolPeriodRequest $request, $code)
    {
        $schoolPeriod = SchoolPeriod::where('code', $code)->firstOrFail();
        $period_number = $request->period_number;
        $codeSchoolPeriod = $request->code;
        $description = $request->description;
        $schoolPeriod->update([
           'period_number'=>$period_number,
           'code'=>$codeSchoolPeriod,
           'description'=>$description,
        ]);

        $user = Auth::user();
        $data = $period_number ." ". $codeSchoolPeriod ." ". $description . " ";
        event(new LogUserActivity($user,"Actualización de Periodo ID: $request->period_number",$data));

        return redirect()->route('schoolPeriod.index');

    }

    public function updateStatus(Request $request, $code)
    {
        $schoolPeriod = SchoolPeriod::where('code', $code)->firstOrFail();

        if ($schoolPeriod->current == false) {

            $schoolPeriod->update([
                'current' => true,
            ]);

        } else {

            $schoolPeriod->update([
                'current' => false,
            ]);

        }

        $user = Auth::user();
        $data = $schoolPeriod->period_number . " " . $schoolPeriod->description;
        return redirect()->route('schoolPeriod.index');
    }

    public function destroy($code)
    {
        $schoolPeriod = SchoolPeriod::where('code',$code)->firstOrFail();
        $schoolPeriod->delete($code);

        $user = Auth::user();
        $data = "Eliminación de Periodo ID: $code";
        event(new LogUserActivity($user,"Eliminación de periodo ID $code",$data));

        return redirect()->route('schoolPeriod.index');
    }

}

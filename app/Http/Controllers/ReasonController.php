<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use App\Http\Requests\StoreReasonRequest;
use App\Http\Requests\UpdateReasonRequest;
use App\Providers\LogUserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $radioButton = $request->get('tipo', 'code');
        $validColumns = ['code', 'name', 'concept'];
        $orderColumn = in_array($radioButton, $validColumns) ? $radioButton : 'code';

        $reasons = DB::table('reasons')
            ->select('code', 'name', 'concept')
            ->where(function ($query) use ($search) {
                $query->where('code', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('concept', 'LIKE', '%' . $search . '%');
            })
            ->orderBy($orderColumn, 'asc')
            ->paginate(10)
            ->withQueryString();

        return view('reason.index', compact('reasons', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reason.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReasonRequest $request)
    {
        $reason = new Reason();
        $reason->code = $request->code;
        $reason->name = $request->name;
        $reason->concept = $request->concept;
        $reason->save();

        $user = Auth::user();
        $data = $request->code ." ". $request->name ." ". $request->concept;
        event(new LogUserActivity($user,"Creación de Motivo",$data));

        return redirect()->route('reason.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        //
        $reason = Reason::where('code',$code)->firstOrFail();
        return view('reason.edit', compact('reason'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReasonRequest  $request
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReasonRequest $request, $code)
    {
        $reason = Reason::where('code',$code)->firstOrFail();
        $code = $request->code;
        $name = $request->name;
        $concept = $request->concept;

        $reason->update([
            'code' => $code,
            'name' => $name,
            'concept' => $concept,
        ]);

        $user = Auth::user();
        $data = $request->code ." ". $request->name ." ". $request->concept;
        event(new LogUserActivity($user,"Actualización del Motivo ID: $request->code",$data));

        return redirect()->route('reason.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reason  $reason
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        $reason = Reason::where('code',$code)->firstOrFail();
        $reason->delete($code);

        $user = Auth::user();
        $data = "Eliminación del Motivo N°: $code";
        event(new LogUserActivity($user,"Eliminación del Motivo ID $code",$data));

        return redirect()->route('reason.index');
    }
}

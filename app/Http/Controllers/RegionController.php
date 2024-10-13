<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Providers\LogUserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));

        $regions = DB::table('regions')
            ->select('code','name')
            ->where('name','LIKE','%'.$search.'%')
            ->orderBy('name','asc')
            ->paginate('10')
            ->withQueryString();

        return view('region.index', compact('regions','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegionRequest $request)
    {
        $region = new Region();
        $region->code = $request->code;
        $region->name = $request->name;
        $region->save();

        $user = Auth::user();
        $data = $request->code ." ". $request->name;
        event(new LogUserActivity($user,"Creación de Zona",$data));

        return redirect()->route('region.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region $region
     * @return \Illuminate\Http\Response
     */
    public function edit($code)
    {
        $region = Region::where('code', $code)->firstOrFail();
        return view('region.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegionRequest $request
     * @param  \App\Models\Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegionRequest $request, $code)
    {
        $region = Region::where('code',$code)->firstOrFail();
        $region->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        $user = Auth::user();
        $data = $request->code ." ". $request->name;
        event(new LogUserActivity($user,"Actualización de la Zona ID: $request->id",$data));
        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region $region
     * @return \Illuminate\Http\Response
     */
    public function destroy($code)
    {
        //$zonaEliminarPrograma = DB::table('zona__dependencia__programas')->where("id_zona",$id)->delete();
        //$zonaEliminarDependencia = DB::table('zona__dependencias')->where('id_zona',$id)->delete();
        $region = Region::where('code',$code)->firstOrFail();
        $region->delete($code);

        $user = Auth::user();
        $data = "Eliminación de la Zona ID: $code";
        event(new LogUserActivity($user,"Eliminación de la Zona ID $code",$data));

        return redirect()->route('region.index');
    }
    public static function getAllRegions()
    {
        $regionList = Region::all();
        return $regionList;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
use App\Providers\LogUserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     * Función usada para mostrar los docentes y su respectiva información
     * Usada en la vista docente.index
     * @see resources/views/docente/index.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));
        $radioButton = $request->get('tipo');

        //https://youtu.be/XeYd_kYkUJE

        $lecturers = DB::table('lecturers')
            ->select('staff_number','names','lastname','maternal_surname','email')
            ->where('staff_number','LIKE','%'.$search.'%')
            ->orWhere('names','LIKE','%'.$search.'%')
            ->orWhere('lastname','LIKE','%'.$search.'%')
            ->orWhere('maternal_surname','LIKE','%'.$search.'%')
            ->orWhere('email','LIKE','%'.$search.'%')
            ->paginate('10')
            ->withQueryString();

        if(isset($radioButton)){

            switch ($radioButton){

                case "staff_number":
                    $lecturers = DB::table('lecturers')
                        ->select('staff_number','names','lastname','maternal_surname','email')
                        ->where('staff_number','LIKE','%'.$search.'%')
                        ->orderBy('staff_number', 'asc')
                        ->paginate(10)
                        ->withQueryString();

                    break;

                case "names":
                    $lecturers = DB::table('lecturers')
                        ->select('staff_number','names','lastname','maternal_surname','email')
                        ->where('names','LIKE','%'.$search.'%')
                        ->orderBy('names', 'asc')
                        ->paginate(10)
                        ->withQueryString();

                    break;

                case "lastname":
                    $lecturers = DB::table('lecturers')
                        ->select('staff_number','names','lastname','maternal_surname','email')
                        ->where('lastname','LIKE','%'.$search.'%')
                        ->orderBy('lastname', 'asc')
                        ->paginate(10)
                        ->withQueryString();

                    break;

                case "apellidoMaterno":
                    $lecturers = DB::table('lecturers')
                        ->select('staff_number','names','lastname','maternal_surname','email')
                        ->where('maternal_surname','LIKE','%'.$search.'%')
                        ->orderBy('maternal_surname', 'asc')
                        ->paginate(10)
                        ->withQueryString();

                    break;

                case "email":
                    $lecturers = DB::table('lecturers')
                        ->select('staff_number','names','lastname','maternal_surname','email')
                        ->where('email','LIKE','%'.$search.'%')
                        ->orderBy('email', 'asc')
                        ->paginate(10)
                        ->withQueryString();

                    break;

                default:
                    $lecturers = DB::table('lecturers')
                        ->select('staff_number','names','lastname','maternal_surname','email')
                        ->where('staff_number','LIKE','%'.$search.'%')
                        ->orWhere('names','LIKE','%'.$search.'%')
                        ->orWhere('lastname','LIKE','%'.$search.'%')
                        ->orWhere('maternal_surname','LIKE','%'.$search.'%')
                        ->orWhere('email','LIKE','%'.$search.'%')
                        ->orderBy('staff_number','asc')
                        ->paginate(10)
                        ->withQueryString();
            }

        }

        return view('lecturer.index', compact('lecturers','search'));
    }

    /**
     * Show the form for creating a new resource.
     * Función para mostrar la vista
     * @see resources/views/docente/create.blade.php
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturer.create');
    }

    /**
     * Store a newly created resource in storage.
     * Si en algún momento se añade un nuevo atributo al Modelo
     * @see Docente
     * @param  \App\Http\Requests\StoreLecturerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLecturerRequest $request)
    {
        $lecturer = new Lecturer();
        $lecturer->staff_number = $request->staff_number;
        $lecturer->names = $request->names;
        $lecturer->lastname = $request->lastname;
        $lecturer->maternal_surname = $request->maternal_surname;
        $lecturer->email = $request->email;
        $lecturer->save();

        $user = Auth::user();
        $data = $request->staff_number ." ". $request->names ." ". $request->lastname ." ". $request->maternal_surname ." ".$request->email;
        event(new LogUserActivity($user,"Creación de Docente",$data));

        return redirect()->route('lecturer.index');
    }

    /**
     * Show the form for editing the specified resource.
     * Retorna las variables que se cargarán como apoyo en el formulario
     * @param  \App\Models\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit($staff_number)
    {
        $lecturer = Lecturer::findOrFail($staff_number);
        return view('lecturer.edit', compact('lecturer'));

    }

    /**
     * Update the specified resource in storage.
     * Actualiza la información del docente
     *
     * @param  \App\Http\Requests\UpdateLecturerRequest $request
     * @param  \App\Models\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLecturerRequest $request, $staff_number)
    {
        $lecturer = Lecturer::findOrFail($staff_number);
        $lecturer->update([
            'staff_number' => $request->staff_number,
            'names' => $request->names,
            'lastname' => $request->lastname,
            'maternal_surname' => $request->maternal_surname,
            'email' => $request->email,
        ]);

        $user = Auth::user();
        $data = $request->staff_number ." ". $request->names ." ". $request->lastname ." ". $request->maternal_surname ." ".$request->email;
        event(new LogUserActivity($user,"Actualización de Docente ID: $request->staff_number",$data));

        return redirect()->route('lecturer.index');
    }

    /**
     * Remove the specified resource from storage.
     * Elimina al docente
     * @param  \App\Models\Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($staff_number)
    {
        $lecturer = Lecturer::findOrFail($staff_number);
        $lecturer->delete();

        $user = Auth::user();
        $data = "Eliminación de Docente ID: $lecturer->staff_number";
        event(new LogUserActivity($user,"Eliminación de Docente ID $lecturer->staff_number",$data));

        return redirect()->route('lecturer.index');

    }

}

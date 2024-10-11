<?php

use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoAsignacionController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ZonaDependenciaController;
use App\Http\Controllers\EducationalProgramsController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ExperienciaEducativaController;
use App\Http\Controllers\LogUserActivityController;
use App\Http\Controllers\SchoolPeriodController;
use App\Http\Controllers\CurriculumDetailsController;
use App\Models\Region;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('join', function () {
    return view('joinTeam');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','team'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified','team'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(VacanteController::class)->group(function (){

    Route::name('vacante.')->group(function (){

        Route::get('/vacante',  'index') ->name('index');
        Route::get('/vacante/search',  'search') ->name('search');

        Route::get('/vacante/create',  'create')->name('create');
        Route::post('/vacante',  'store')->name('store');
        Route::delete('/vacante/destroy/{id}',  'destroy')->name('destroy');

        Route::get('/vacante/edit/{id}','edit')->name('edit');
        Route::get('/vacante/editRenuncia/{id}','editRenuncia')->name('editRenuncia');

        Route::post('/vacante/update/{id}','update')->name('update');
        Route::post('/vacante/updateE/{id}','updateE')->name('updateE');
        Route::post('/vacante/updateRenuncia/{id}','updateRenuncia')->name('updateRenuncia');

        Route::get('/vacante/import',  'import')->name('import');
        Route::post('/vacante/upload','uploadCSV')->name('upload');

        Route::post('/vacante/storeDocente', 'storeDocente')->name('storeDocente');
        Route::post('/vacante/storeEe', 'storeEe')->name('storeEe');

        Route::post('/vacante/deleteFile/{id}/{file}', 'deleteFile')->name('deleteFile');

    });

});

Route::post('api/fetch-dependencias', [ZonaDependenciaController::class, 'fetchDependencia']);
Route::post('api/fetch-horasExperienciaEducativa', [VacanteController::class, 'fetchHorasExperienciaEducativa']);
Route::post('api/fetch-regionDepartments', [EducationalProgramsController::class, 'fetchRegionDepartments']);
Route::post('api/fetch-dependenciaVacante', [VacanteController::class, 'fetchDependenciaVacante']);
Route::post('api/fetch-programaVacante', [VacanteController::class, 'fetchProgramaVacante']);
Route::post('api/fetch-filtroNombre', [VacanteController::class, 'fetchFiltroNombre']);

Route::controller(LecturerController::class)->group(function (){

    Route::name('lecturer.')->group(function (){

        Route::get('/lecturer',  'index') ->name('index');
        Route::get('/lecturer/create',  'create')->name('create');
        Route::post('/lecturer',  'store')->name('store');
        Route::delete('/lecturer/destroy/{staff_number}',  'destroy')->name('destroy');

        Route::get('/lecturer/edit/{staff_number}','edit')->name('edit');
        Route::post('/lecturer/update/{staff_number}','update')->name('update');

        Route::get('/lecturer/export','export')->name('export');


    });

});

Route::controller(LogUserActivityController::class)->group(function (){

    Route::name('bitacora.')->group(function (){

        Route::get('/bitacora',  'index') ->name('index');

    });

});

Route::controller(ExperienciaEducativaController::class)->group(function (){

    Route::name('experienciaEducativa.')->group(function (){

        Route::get('/experienciaEducativa',  'index') ->name('index');
        Route::get('/experienciaEducativa/create',  'create')->name('create');
        Route::post('/experienciaEducativa',  'store')->name('store');
        Route::delete('/experienciaEducativa/destroy/{id}',  'destroy')->name('destroy');

        Route::get('/experienciaEducativa/edit/{id}','edit')->name('edit');
        Route::post('/experienciaEducativa/update/{id}','update')->name('update');

    });

});

Route::controller(SchoolPeriodController::class)->group(function (){

    Route::name('schoolPeriod.')->group(function (){

        Route::get('/schoolPeriod',  'index') ->name('index');
        Route::get('/schoolPeriod/create',  'create')->name('create');
        Route::post('/schoolPeriod',  'store')->name('store');
        Route::delete('/schoolPeriod/destroy/{code}',  'destroy')->name('destroy');

        Route::get('/schoolPeriod/edit/{code}','edit')->name('edit');
        Route::post('/schoolPeriod/update/{code}','update')->name('update');

        Route::post('/schoolPeriod/updateStatus/{code}','updateStatus')->name('updateStatus');


    });

});

Route::controller(TipoAsignacionController::class)->group(function (){

    Route::name('tipoAsignacion.')->group(function (){

        Route::get('/tipoAsignacion',  'index') ->name('index');
        Route::get('/tipoAsignacion/create',  'create')->name('create');
        Route::post('/tipoAsignacion',  'store')->name('store');
        Route::delete('/tipoAsignacion/destroy/{id}',  'destroy')->name('destroy');

        Route::get('/tipoAsignacion/edit/{id}','edit')->name('edit');
        Route::post('/tipoAsignacion/update/{id}','update')->name('update');

    });

});


Route::controller(ReasonController::class)->group(function (){

    Route::name('reason.')->group(function (){

        Route::get('/reason',  'index') ->name('index');
        Route::get('/reason/create',  'create')->name('create');
        Route::post('/reason',  'store')->name('store');
        Route::delete('/reason/destroy/{code}',  'destroy')->name('destroy');

        Route::get('/reason/edit/{code}','edit')->name('edit');
        Route::post('/reason/update/{code}','update')->name('update');

    });

});


Route::controller(RegionController::class)->group(function (){

    Route::name('region.')->group(function (){

        Route::get('/region',  'index') ->name('index');
        Route::get('/region/create',  'create')->name('create');
        Route::post('/region',  'store')->name('store');
        Route::delete('/region/destroy/{code}',  'destroy')->name('destroy');

        Route::get('/region/edit/{code}','edit')->name('edit');
        Route::post('/region/update/{code}','update')->name('update');

    });

});

Route::controller(EducationalProgramsController::class)->group(function (){

    Route::name('educationalPrograms.')->group(function (){

        Route::get('/educationalPrograms',  'index') ->name('index');
        Route::get('/educationalPrograms/create',  'create')->name('create');
        Route::post('/educationalPrograms',  'store')->name('store');
        Route::delete('/educationalPrograms/destroy/{program_code}',  'destroy')->name('destroy');

        Route::get('/educationalPrograms/edit/{program_code}','edit')->name('edit');
        Route::post('/educationalPrograms/update/{program_code}','update')->name('update');
        Route::get('/educationalPrograms/curriculums/{code}','viewEducationalPlans')->name('viewEducationalPlans');

    });

});

Route::controller(ZonaDependenciaController::class)->group(function (){

    Route::name('zonaDependencia.')->group(function (){

        Route::get('/zonaDependencia',  'index') ->name('index');
        Route::get('/zonaDependencia/create',  'create')->name('create');
        Route::post('/zonaDependencia',  'store')->name('store');
        Route::delete('/zonaDependencia/destroy/{id}',  'destroy')->name('destroy');

        Route::get('/zonaDependencia/edit/{id}','edit')->name('edit');
        Route::post('/zonaDependencia/update/{id}','update')->name('update');

        Route::get('/zonaDependencia/reporte/{claveDependencia}','reporte')->name('reporte');

    });

});

Route::controller(CurriculumController::class)->group(function (){

    Route::name('curriculum.')->group(function (){

        Route::get('/curriculum',  'index') ->name('index');
        Route::get('/curriculum/create',  'create')->name('create');
        Route::post('/curriculum',  'store')->name('store');
        Route::delete('/curriculum/destroy/{code}',  'destroy')->name('destroy');
        Route::get('/curriculum/edit/{code}','edit')->name('edit');
        Route::post('/curriculum/update/{code}','update')->name('update');
        Route::post('/curriculum/updateStatus/{code}','updateStatus')->name('updateStatus');
        Route::get('/curriculum/details/{code}','goToCurriculumDetailsWindow')->name('goToCurriculumDetailsWindow');
    });
});

Route::controller(CurriculumDetailsController::class)->group(function (){

    Route::name('curriculumDetails.')->group(function () {
        Route::get('/curriculumDetails',  'index')->name('index');
        Route::get('/curriculumDetails/create',  'create')->name('create');
        Route::post('/curriculumDetails',  'store')->name('store');
        Route::delete('/curriculumDetails/destroy/{code}',  'destroy')->name('destroy');
        Route::get('/curriculumDetails/edit/{code}', 'edit')->name('edit');
        Route::post('/curriculumDetails/update/{code}', 'update')->name('update');
        Route::post('/curriculumDetails/upload-csv', [CurriculumDetailsController::class, 'uploadCsv'])->name('uploadCsv');
    });
});

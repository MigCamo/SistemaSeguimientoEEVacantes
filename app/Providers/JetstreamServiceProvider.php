<?php

namespace App\Providers;

use App\Actions\Jetstream\AddTeamMember;
use App\Actions\Jetstream\CreateTeam;
use App\Actions\Jetstream\DeleteTeam;
use App\Actions\Jetstream\DeleteUser;
use App\Actions\Jetstream\InviteTeamMember;
use App\Actions\Jetstream\RemoveTeamMember;
use App\Actions\Jetstream\UpdateTeamName;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

use App\Models\Zona;
use App\Models\Zona_Dependencia;
use App\Http\Controllers\ZonaDependenciaController;
use App\Models\Region;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::createTeamsUsing(CreateTeam::class);
        Jetstream::updateTeamNamesUsing(UpdateTeamName::class);
        Jetstream::addTeamMembersUsing(AddTeamMember::class);
        Jetstream::inviteTeamMembersUsing(InviteTeamMember::class);
        Jetstream::removeTeamMembersUsing(RemoveTeamMember::class);
        Jetstream::deleteTeamsUsing(DeleteTeam::class);
        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::registerView(function () {
            $data['regionList'] = Region::get(["code", "name"]);
            return view('auth.register', $data);
        });

    }

    /**
     * Configure the roles and permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        //Jetstream::role('admin', 'Administrator', [
        Jetstream::role('admin', 'DGAAEA', [
            'create',
            'read',
            'update',
            'delete',
        ])->description('Los usuarios del DGAAEA pueden realizar cualquier acción.');

        //Jetstream::role('editor', 'Editor', [
        Jetstream::role('editor', 'Facultad', [
            'read',
            'create',
            'update',
        //])->description('Editor users have the ability to read, create, and update.');
        ])->description('Los usuarios pueden consultar, crear y actualizar las vacantes de su facultad.');
    }
}

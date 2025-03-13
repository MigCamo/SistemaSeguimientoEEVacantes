<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\TeamInvitation;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
{
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    ])->validate();

    return DB::transaction(function () use ($input) {
        // Crear el usuario
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'dependencia' => $input['departament'],
            'zona' => $input['region'],
        ]);

        // Buscar una invitación pendiente para ese correo
        $invitation = TeamInvitation::where('email', $user->email)->first();

        if ($invitation) {
            // Obtener el team_id y el role de la invitación
            $team_id = $invitation->team_id;
            $role = $invitation->role;

            // Asociar el usuario con el equipo en la tabla Team_User
            $team = $invitation->team;  // Obtener el equipo relacionado con la invitación
            $team->users()->attach($user->id, ['role' => $role]);

        }

        return $user;
    });
}
    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}

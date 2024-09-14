<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function reset($user, array $input)
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate();

        // Asegúrate de cargar la relación 'account'
        $user = $user->fresh(['account']); // Recargar el usuario con la relación 'account'

        if ($user && $user->account) {
            $user->account->forceFill([
                'password' => Hash::make($input['password']),
            ])->save();
        } else {
            throw new \Exception('The user does not have an associated account.');
        }
    }

}

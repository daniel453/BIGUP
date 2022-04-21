<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required'],
            'cedula' => ['required', 'max:12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rango' => ['required'],
            'contingente' => ['required', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'apellido' => $input['apellido'],
            'email' => $input['email'],
            'cedula' => $input['cedula'],
            'id_roles' => $input['rango'],
            'contingente' => $input['contingente'],
            'password' => Hash::make($input['password']),
        ]);
    }
}

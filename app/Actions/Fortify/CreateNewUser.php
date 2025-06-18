<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rules;
class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
{
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'father_name' => ['required', 'string', 'max:255'],
        'mother_name' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'in:male,female,other'],
        'date_of_birth' => ['required', 'date','before:today', 'after:1900-01-01'],
        'country_of_birth' => ['required', 'string', 'max:255'],
        'city_of_birth' => ['required', 'string', 'max:255'],
        'residence_permit_number' => ['required', 'string', 'max:255','unique:users'],
        'passport_number' => ['required', 'string', 'max:255','unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ])->validate();

    return User::create([
        'name' => $input['name'],
        'father_name' => $input['father_name'],
        'mother_name' => $input['mother_name'],
        'gender' => $input['gender'],
        'date_of_birth' => $input['date_of_birth'],
        'country_of_birth' => $input['country_of_birth'],
        'city_of_birth' => $input['city_of_birth'],
        'residence_permit_number' => $input['residence_permit_number'],
        'passport_number' => $input['passport_number'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
    ]);
}
public function authenticated(Request $request, $user)
{
    if (!$user->hasVerifiedEmail()) {
        Auth::logout();

        return redirect('/login')->with('error', 'You must verify your email before logging in.');
    }
}
}

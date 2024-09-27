<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    protected function passwordRules(): array
    {
        return [
            'required',
            'string',
            Password::min(8) // Minimum length of 8 characters
                ->mixedCase() // At least one uppercase and one lowercase letter
                ->numbers() // At least one number
                ->symbols() // At least one special character
                ->uncompromised(), // Ensures the password is not found in a list of compromised passwords
            'confirmed', // Password confirmation must match
        ];
    }
}

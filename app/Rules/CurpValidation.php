<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CurpValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('web');
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) !== 18) {
            return false;
        }

        if (!preg_match('/^[A-Z0-9]+$/', $value)) {
            return false;
        }

        if (!preg_match('/^[A-Z]{4}\d{6}[HM][A-Z]{5}[A-Z0-9]{2}$/', $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El CURP proporcionado no es válido.';
        // return 'The validation error message.';
    }
}

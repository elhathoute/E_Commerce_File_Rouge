<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidCity implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    protected $validCities=['Casablanca', 'Rabat', 'Marrakech', 'Agadir','Safi','Tanger','Fes'];
    public function passes($attribute, $value)
    {
        return in_array($value,$this->validCities);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'is not a valid city in Morocco.';
    }
}

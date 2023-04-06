<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidPostal implements Rule
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
    public function passes($attribute, $value)
    {
        $regex_postal='/^\d{5}$/'; //contain 5 digits in min and max
        if(preg_match($regex_postal,$value)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'is not a valid Postal Morocco.';

    }
}

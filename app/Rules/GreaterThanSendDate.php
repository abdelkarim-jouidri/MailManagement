<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class GreaterThanSendDate implements Rule
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
        $date_envoie = request()->input('date_envoie');

        return strtotime($value) > strtotime($date_envoie);


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'la date d`arrivee doit etre superieur à la date d`envoie';
    }
}

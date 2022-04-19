<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class hex_color implements Rule
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
        $value = strtolower($value);
        $css_colors = array('black','silver','gray','white');

        if (ctype_xdigit($value) and strlen($value)==6)
        {
            return True;
        }

        if (in_array($value, $css_colors))
        {
            return True;
        }

        return False;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Color must be a 6 digit hexadecimal number or a valid css color.';
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class AlphaNumSpecial implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (preg_match('/^[ A-Za-z0-9_@./#&+-]*$/', $value) == false) {
            $fail('The :attribute must be contain.');
        }
    }
}

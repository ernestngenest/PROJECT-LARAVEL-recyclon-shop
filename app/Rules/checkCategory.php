<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class checkCategory implements Rule
{
    protected $words;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(array $words)
    {   
        $this->words = $words;
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
        return in_array($value,$this->words);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The .';
    }
}

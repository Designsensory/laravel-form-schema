<?php

namespace Designsensory\FormSchema\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \designsensory\FormSchema\FormSchema
 */
class FormSchema extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Designsensory\FormSchema\FormSchema::class;
    }
}

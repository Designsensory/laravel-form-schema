<?php

namespace Designsensory\FormSchema\Exceptions;

use Designsensory\FormSchema\Contracts\FormContract;
use Exception;
use Illuminate\Database\Eloquent\Model;

class InvalidConfiguration extends Exception
{
    public static function modelIsNotValid(string $className): self
    {
        return new static("The given model class `{$className}` does not implement `".FormContract::class.'` or it does not extend `'.Model::class.'`');
    }
}

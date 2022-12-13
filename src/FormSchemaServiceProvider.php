<?php

namespace Designsensory\FormSchema;

use Designsensory\FormSchema\Exceptions\InvalidConfiguration;
use Designsensory\LaravelFormSchema\Models\Field;
use Designsensory\LaravelFormSchema\Models\Form;
use Designsensory\LaravelFormSchema\Models\Submission;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FormSchemaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-form-schema')
            ->hasConfigFile('formschema')
            ->hasMigration('create_laravel-form-schema_table')->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp();
            });
    }


    public static function determineFormModel(): string
    {
        $model = config('formschema.forms.model') ?? Form::class;

        if (! is_a($model, Form::class, true)
            || ! is_a($model, Model::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($model);
        }

        return $model;
    }

    public static function determineFieldModel(): string
    {
        $model = config('formschema.fields.model') ?? Form::class;

        if (! is_a($model, Field::class, true)
            || ! is_a($model, Model::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($model);
        }

        return $model;
    }

    public static function determineSubmissionModel(): string
    {
        $model = config('formschema.submissions.model') ?? Form::class;

        if (! is_a($model, Submission::class, true)
            || ! is_a($model, Model::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($model);
        }

        return $model;
    }
}

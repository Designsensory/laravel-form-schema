<?php

namespace Designsensory\FormSchema;

use Designsensory\FormSchema\Contracts\FieldContract;
use Designsensory\FormSchema\Contracts\FormContract;
use Designsensory\FormSchema\Contracts\SubmissionContract;
use Designsensory\FormSchema\Exceptions\InvalidConfiguration;
use Designsensory\FormSchema\Models\Field;
use Designsensory\FormSchema\Models\Form;
use Designsensory\FormSchema\Models\Submission;
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
            ->name('form-schema')
            ->hasConfigFile('formschema')
            ->publishesServiceProvider('FormSchemaServiceProvider')
            ->hasMigration('create_form_schema_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->copyAndRegisterServiceProviderInApp();
            });
    }

    public static function determineFormModel(): string
    {
        $model = config('formschema.forms.model') ?? Form::class;

        if (! is_a($model, FormContract::class, true)
            || ! is_a($model, Model::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($model);
        }

        return $model;
    }

    public static function determineFieldModel(): string
    {
        $model = config('formschema.fields.model') ?? Field::class;

        if (! is_a($model, FieldContract::class, true)
            || ! is_a($model, Model::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($model);
        }

        return $model;
    }

    public static function determineSubmissionModel(): string
    {
        $model = config('formschema.submissions.model') ?? Submission::class;

        if (! is_a($model, SubmissionContract::class, true)
            || ! is_a($model, Model::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($model);
        }

        return $model;
    }
}

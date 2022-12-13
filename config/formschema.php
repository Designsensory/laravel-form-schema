<?php

// config for designsensory/FormSchema
return [
    'database_connection' => env('FORM_SCHEMA_DB_CONNECTION'),
    'forms' => [
        'table_name' => 'formschema_forms',
        'model' => \Designsensory\LaravelFormSchema\Models\Form::class,
    ],
    'fields' => [
        'table_name' => 'formschema_fields',
        'model' => \Designsensory\LaravelFormSchema\Models\Field::class,
    ],
    'submissions' => [
        'table_name' => 'formschema_submissions',
        'model' => \Designsensory\LaravelFormSchema\Models\Submission::class,
    ],
];

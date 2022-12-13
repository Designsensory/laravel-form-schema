<?php

// config for designsensory/FormSchema
return [
    'database_connection' => env('FORM_SCHEMA_DB_CONNECTION'),
    'forms' => [
        'table_name' => 'formschema_forms',
        'model' => \Designsensory\FormSchema\Models\Form::class,
    ],
    'fields' => [
        'table_name' => 'formschema_fields',
        'model' => \Designsensory\FormSchema\Models\Field::class,
    ],
    'submissions' => [
        'table_name' => 'formschema_submissions',
        'model' => \Designsensory\FormSchema\Models\Submission::class,
    ],
];

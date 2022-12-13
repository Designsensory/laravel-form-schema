<?php

namespace Designsensory\FormSchema\Models;

use Designsensory\FormSchema\Contracts\SubmissionContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Form
 *
 * @property string title
 */
class Submission extends Model implements SubmissionContract
{
    public function __construct(array $attributes = [])
    {
        if (! isset($this->connection)) {
            $this->setConnection(config('formschema.database_connection'));
        }

        if (! isset($this->table)) {
            $this->setTable(config('formschema.submissions.table_name'));
        }

        parent::__construct($attributes);
    }

    /**
     * @return BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}

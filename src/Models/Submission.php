<?php

namespace Designsensory\LaravelFormSchema\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Form
 *
 * @property string title
 */
class Submission extends Model
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

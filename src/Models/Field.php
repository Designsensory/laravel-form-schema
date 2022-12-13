<?php

namespace Designsensory\FormSchema\Models;

use Designsensory\FormSchema\Contracts\FieldContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Form
 *
 * @property string title
 */
class Field extends Model implements FieldContract
{
    protected $casts = [
        'attributes' => 'collection',
    ];

    public function __construct(array $attributes = [])
    {
        if (! isset($this->connection)) {
            $this->setConnection(config('formschema.database_connection'));
        }

        if (! isset($this->table)) {
            $this->setTable(config('formschema.fields.table_name'));
        }

        parent::__construct($attributes);
    }

    /**
     * @return BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Field::class);
    }
}

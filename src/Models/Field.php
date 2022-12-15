<?php

namespace Designsensory\FormSchema\Models;

use Designsensory\FormSchema\Contracts\FieldContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Form
 *
 * @property string title
 */
class Field extends Model implements FieldContract
{
    use HasSlug;

    protected $casts = [
        'html_attributes' => 'array',
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

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom(fn() => 'form-' . $this->form_id . '-' . $this->label )->saveSlugsTo('name')->usingSeparator('_');
    }

    /**
     * @return BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(config('formschema.forms.model'));
    }
}

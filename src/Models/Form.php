<?php

namespace Designsensory\FormSchema\Models;

use Designsensory\FormSchema\Contracts\FormContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Form
 *
 * @property string title
 */
class Form extends Model implements FormContract
{
    use HasSlug;

    public function __construct(array $attributes = [])
    {
        if (! isset($this->connection)) {
            $this->setConnection(config('formschema.database_connection'));
        }

        if (! isset($this->table)) {
            $this->setTable(config('formschema.forms.table_name'));
        }

        parent::__construct($attributes);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    /**
     * @return HasMany
     */
    public function fields(): HasMany
    {
        return $this->hasMany(config('formschema.fields.model'));
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(config('formschema.submissions.model'));
    }
}

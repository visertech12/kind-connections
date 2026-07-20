<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    
    // NOTE: 'attributes' column is handled manually via getAttribute/setAttribute overrides below
    // to avoid collision with Eloquent's internal $this->attributes property.
    protected $casts = [];

    /**
     * Override getAttribute to safely handle the 'attributes' column
     * which otherwise conflicts with Eloquent's internal $attributes array.
     */
    public function getAttribute($key)
    {
        if ($key === 'attributes') {
            $raw = $this->getOriginal('attributes');
            if (is_array($raw)) return $raw;
            if (is_string($raw)) return json_decode($raw, true) ?: [];
            return [];
        }
        return parent::getAttribute($key);
    }

    /**
     * Override setAttribute to safely write the 'attributes' JSON column.
     */
    public function setAttribute($key, $value)
    {
        if ($key === 'attributes') {
            $this->attributes['attributes'] = is_array($value) ? json_encode($value) : $value;
            return $this;
        }
        return parent::setAttribute($key, $value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function downloads()
    {
        return $this->hasMany(ProductDownload::class);
    }

    public function views()
    {
        return $this->hasMany(ProductView::class);
    }
}

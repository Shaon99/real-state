<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }


    public function gallery()
    {
        return $this->hasMany(PropertiesGallery::class, 'property_id', 'id');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCounty extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sub_counties';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'county_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subCountyWards()
    {
        return $this->hasMany(Ward::class, 'sub_county_id', 'id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

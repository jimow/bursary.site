<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'wards';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'sub_county_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function wardApplications()
    {
        return $this->hasMany(Application::class, 'ward_id', 'id');
    }

    public function sub_county()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Application extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const CDF_APPLIED_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const DISABILITY_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const RECOMMENDED_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const COUNTY_APPLIED_RADIO = [
        '1' => 'Yes',
        '0' => 'No',
    ];

    public const ON_SCHOLARSHIPS_SELECT = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const GENDER_RADIO = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    public const BOTH_PARENTS_ALIVE_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const RECOMMENDED_FOR_COUNTY_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public const RECEIVED_BURSARY_BEFORE_RADIO = [
        'yes' => 'Yes',
        'no'  => 'No',
    ];

    public $table = 'applications';

    public static $searchable = [
        'first_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'fathers_identity_card',
        'attach_student_grade',
        'mothers_identity_card',
        'fees_structure',
        'fee_balance_attach',
        'attach_voter_card',
        'upload_application_form',
    ];

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'other_names',
        'location',
        'sub_location',
        'tel_no',
        'village',
        'institution',
        'admission_number',
        'form_year',
        'disability',
        'specify_disability',
        'received_bursary_before',
        'both_parents_alive',
        'fathers_name',
        'fathers_occupation',
        'mothers_name',
        'mothers_occupation',
        'fathers_tel_no',
        'mothers_tel_no',
        'total_fees_payable',
        'fee_balance',
        'student_grade',
        'recommended',
        'created_at',
        'ward_id',
        'on_scholarships',
        'sub_county_id',
        'voter_card',
        'cdf_amount_awarded',
        'county_amount_awarded',
        'recommended_for_county',
        'financial_year_id',
        'type_id',
        'gender',
        'cdf_applied',
        'county_applied',
        'course_id',
        'application_no',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function sub_county()
    {
        return $this->belongsTo(SubCounty::class, 'sub_county_id');
    }

    public function financial_year()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id');
    }

    public function type()
    {
        return $this->belongsTo(Institution::class, 'type_id');
    }

    public function getFathersIdentityCardAttribute()
    {
        return $this->getMedia('fathers_identity_card')->last();
    }

    public function getAttachStudentGradeAttribute()
    {
        return $this->getMedia('attach_student_grade')->last();
    }

    public function getMothersIdentityCardAttribute()
    {
        return $this->getMedia('mothers_identity_card')->last();
    }

    public function getFeesStructureAttribute()
    {
        return $this->getMedia('fees_structure')->last();
    }

    public function getFeeBalanceAttachAttribute()
    {
        return $this->getMedia('fee_balance_attach')->last();
    }

    public function getAttachVoterCardAttribute()
    {
        return $this->getMedia('attach_voter_card')->last();
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getUploadApplicationFormAttribute()
    {
        return $this->getMedia('upload_application_form')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

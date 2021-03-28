<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientLab extends Model
{
    use HasFactory;
    protected  $table ='patient_lab';
    protected $fillable =['date_of_test', 'lab_number', 'clinic_code'];

    public function LabStudies(){
        return $this->hasOne('App\Models\LabStudies');
    }
    public function Patient(){
        return $this->belongsTo('App\Models\Patient');
    }
}

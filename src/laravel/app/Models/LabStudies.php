<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabStudies extends Model
{
    use HasFactory;
    protected  $table ='lab_studies';
    protected $fillable =['code', 'name', 'value', 'unit', 'ref_range', 'finding', 'result_state'];

    public function PatientLabs(){
        return $this->belongsTo('App\Models\PatientLab', 'PatientLabs_id');
    }

}

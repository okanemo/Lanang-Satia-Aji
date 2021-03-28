<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected  $table ='patients';
    protected $fillable =['id_number', 'first_name', 'phone_mobile','gender', 'date_of_birth', 'last_name'];

    public function PatientLab(){
        return $this->hasMany('App\Models\PatientLab');
    }
}

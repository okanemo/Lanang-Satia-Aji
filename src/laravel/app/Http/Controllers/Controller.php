<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\LabStudies;
use App\Models\Patient;
use App\Models\PatientLab;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(Request $request) {
        function split_name($name) {                                    //function split patient name to first and last name
            $name = trim($name);
            $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
            $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
            return array($first_name, $last_name);
        }

        
        if($request->has('patient_data')){                              //cek patient_data ada atau tidak dalam payload? case2
            $patient = Patient::firstOrCreate([                         //cek data patient sudah ada atau belum, jika belum create (menggunakan firstOrCreate)
                'id_number' => $request->patient_data['id_number'],
                'first_name' => $request ->patient_data['first_name'],
                'last_name' => $request ->patient_data['last_name'],
                'phone_mobile' => $request->patient_data['phone_mobile'],
                'gender' => $request ->patient_data['gender'],
                'date_of_birth' => $request ->patient_data['date_of_birth'],
            ]);

            $cek = Patient::exists();
            dd($cek);    
            $patientLabs = $patient->PatientLab()->create([
                'date_of_test' => $request ->input ('date_of_test'),
                'lab_number' => $request ->input ('lab_number'),
                'clinic_code' => $request ->input ('clinic_code')
            ]);
                
            foreach ($request->lab_studies as $lab_studies) {
            $labStudies = $patientLabs->LabStudies()->firstOrCreate([
                'code' => $lab_studies['code'],
                'name' => $lab_studies['name'],
                'value' => $lab_studies['value'],
                'unit' => $lab_studies['unit'],
                'ref_range' => $lab_studies['ref_range'],
                'finding' => $lab_studies['finding'],
                'result_state' => $lab_studies['result_state'],
                ]);
            }
        
            return response()->json([
                "message" => "success add to database",
            ]);
        }

        else {                                                          //case 2, tidak ada atribut patient_data
        $name = split_name($request->patient_name);                     //split patient_name
        $first_name = $name[0];
        $last_name = $name[1];

        $patient = Patient::firstOrCreate([
            'id_number' => $request ->input ('id_number'),            
            'first_name' => $first_name,
            'last_name' => $last_name,
            'gender' => $request ->input ('gender'),
            'date_of_birth' => $request ->input ('date_of_birth'),
        ]);

        $patientLabs = $patient->PatientLab()->create([
            'date_of_test' => $request ->input ('date_of_test'),
            'lab_number' => $request ->input ('lab_number'),
            'clinic_code' => $request ->input ('clinic_code')
        ]);
            
        foreach ($request->lab_studies as $lab_studies) {
        $labStudies = $patientLabs->LabStudies()->firstOrCreate([
            'code' => $lab_studies['code'],
            'name' => $lab_studies['name'],
            'value' => $lab_studies['value'],
            'unit' => $lab_studies['unit'],
            'ref_range' => $lab_studies['ref_range'],
            'finding' => $lab_studies['finding'],
            'result_state' => $lab_studies['result_state'],
            ]);
            }
    
        return response()->json([
            "message" => "success add to database",
            ]);
        }
    }

   
}
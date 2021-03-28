# How to run code
## required
1. Docker
2. Laravel 8
3. Postman
4. MySql (http://localhost:8081/)

  MySql server : - (kosongin)
  
  MySql username: root
  
  MySql password: secret

## Steps
1. clone repository
2. run _docker-compose build && docker-compose up -d_
3. run _docker exec -it php /bin/sh_
4. on /var/www/html # type _php artisan migrate_
5. to test API Endpoint run POSTMAN
6. POST method on localhost:8080/create 
7. example request 
case_1 = { 
    "date_of_test":"20210227134300", 
    "id_number":"IC000A2", 
    "patient_name":"Patient A4", 
    "gender":"F", 
    "date_of_birth":"19940231", 
    "lab_number":"QT196-21-124", 
    "clinic_code":"QT196", 
    "lab_studies":[
        {
        "code":"2085-9", 
        "name":"HDL Cholesterol", 
        "value":"cancel", 
        "unit":"mg/dL", 
        "ref_range":"> 59", 
        "finding":"A", 
        "result_state":"F"
        } 
    ]
 }
 
case_2 = { 
    "patient_data":
    {
        "id_number":"IC000A3", 
        "first_name":"Patient", 
        "last_name":"A5", 
        "phone_mobile":"+6500000000" 
        "gender":"M", 
        "date_of_birth":"19940231",
    }, 
    "date_of_test":"20210227134300", 
    "lab_number":"QT196-21-124", 
    "clinic_code":"QT196", 
    "lab_studies":[
    {
        "code":"2085-9", 
        "name":"HDL Cholesterol", 
        "value":"cancel", 
        "unit":"mg/dL", 
        "ref_range":"> 59", 
        "finding":"A", 
        "result_state":"F"
    } 
  ]
 }
 
8. response 
{
    "message": "success add to database"
}


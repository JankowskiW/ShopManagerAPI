<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = "users";
    public $primaryKey  = 'Usr_Id';
    public $timestamps = false;
    public $statusCode;

    public $Usr_Id;
    public $Usr_Login;
    public $Usr_Password;
    public $Usr_Salt;


    protected $fillable = [
        'Usr_Id',
        'Usr_Login',
        'Usr_Password',
        'Usr_Salt',
        'Usr_CreatedAt',
        'Usr_UpdatedAt'
    ];


//    function __construct($Usr_Login, $Usr_Password, $Usr_Salt) {
//        $this->Usr_Login = $Usr_Login;
//        $this->Usr_Password = $Usr_Password;
//        $this->Usr_Salt = $Usr_Salt;
//    }

    function addUser() {
        $data = array(['Usr_Login'=>$this->Usr_Login,
                        'Usr_Password'=>$this->Usr_Password,
                        'Usr_Salt'=>$this->Usr_Salt]);
        if(!DB::table($this->table)
            ->where('Usr_Login','like',$this->Usr_Login)
            ->count()) {
            $this->Usr_Id =  DB::table($this->table)->insertGetId(
                ['Usr_Login'=>$this->Usr_Login,
                    'Usr_Password'=>$this->Usr_Password,
                    'Usr_Salt'=>$this->Usr_Salt]);
            $this->statusCode = 201;
        } else {
            $this->statusCode = 409;
        }
    }

    function setRegistrationData($Usr_Login, $Usr_Password, $Usr_Salt) {
        $this->Usr_Login = $Usr_Login;
        $this->Usr_Password = $Usr_Password;
        $this->Usr_Salt = $Usr_Salt;
    }

    function getUserAuthenticationData($userLogin) {
        // if wszystko pobrało ok, then to i to, else to i to.
        // if pobrało jakikolwiek rekord, then to i to else to i to.
        $user = DB::table($this->table)->where('Usr_Login', 'like', $userLogin)->first();
        if(!is_null($user)) {
            $this->Usr_Id = $user->Usr_Id;
            $this->Usr_Login = $user->Usr_Login;
            $this->Usr_Password = $user->Usr_Password;
            $this->Usr_Salt = $user->Usr_Salt;
            $this->statusCode = 200;
        } else {
            $this->statusCode = 401; // zmienić kod na brak wyników.
        }
    }
}

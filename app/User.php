<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = "users";
    public $Usr_Login;
    public $Usr_Password;
    public $Usr_Salt;

    public $primaryKey  = 'Usr_Id';

    public $timestamps = false;

    protected $fillable = [
        'Usr_Id',
        'Usr_Login',
        'Usr_Password',
        'Usr_Salt',
        'Usr_CreatedAt',
        'Usr_UpdatedAt'
    ];

    function __construct($Usr_Login, $Usr_Password, $Usr_Salt) {
        $this->Usr_Login = $Usr_Login;
        $this->Usr_Password = $Usr_Password;
        $this->Usr_Salt = $Usr_Salt;
    }

    function addUser() {
        $data = array(['Usr_Login'=>$this->Usr_Login,
                        'Usr_Password'=>$this->Usr_Password,
                        'Usr_Salt'=>$this->Usr_Salt]);
//        die("Ile ".);
        if(!DB::table($this->table)
            ->where('Usr_Login','like',$this->Usr_Login)
            ->count()) {
            $userId =  DB::table($this->table)->insertGetId(
                ['Usr_Login'=>$this->Usr_Login,
                    'Usr_Password'=>$this->Usr_Password,
                    'Usr_Salt'=>$this->Usr_Salt]);
            die("User ID ".$userId);
        } else {
            die("Record exist.");
        }
//        die("User ID ".$userId);
    }
}

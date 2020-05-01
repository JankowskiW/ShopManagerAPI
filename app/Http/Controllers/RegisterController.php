<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // POST: api/users/register
    public function addUser(Request $request)
    {
        // $request->input('nazwa_pola'); -- odwołanie do nagłówka
        // json_decode($request->getContent(), true)['nazwa_pola']

        $content = json_decode($request->getContent(),true);
        $login = $content["Usr_Login"];
        $password = $content["Usr_Password"];
        $hash = $this->hashSSHA($login, $password);
        $encryptedPassword = $hash["encryptedPassword"];
        $salt = $hash["salt"];

        $user = new User();
        $user->setRegistrationData($login, $encryptedPassword, $salt);
        $user->addUser();
        return response()->json(array("Usr_Id" => $user->Usr_Id, "Usr_Login" => $login), $user->statusCode);
    }

    private function hashSSHA($login, $password) {
        $shuffledString = str_shuffle($login.$password);
        $hash = hash('sha256', $shuffledString);
        $salt = substr($shuffledString,0,10);
        $encryptedPassword = password_hash($salt.$password.$salt, PASSWORD_BCRYPT);
        return array("salt" => $salt, "encryptedPassword" => $encryptedPassword);
//
//        $salt = sha1(rand());
//        $salt = substr($salt, 0, 10);
//        $encrypted = base64_encode(sha1($password.$salt,true).$salt);
//        return array("salt" => $salt, "encryptedPassword" => $encryptedPassword);
    }
}

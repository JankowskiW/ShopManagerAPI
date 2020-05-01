<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    // POST: api/users/login
    public function getUserAuthenticationData(Request $request) {

        $user = new User();
        $content = json_decode($request->getContent(),true);
        // get user salt by login
        $login = $content["Usr_Login"];
        $password = $content["Usr_Password"];
        $user->getUserAuthenticationData($login);
        if($user->statusCode == 200) {
            $salt = $user->Usr_Salt;
            $encryptedPassword = $user->Usr_Password;
            if ($this->checkHashSHA($login, $password, $salt, $encryptedPassword)) {
                $user->statusCode = 200;
                return response()->json(array("Usr_Id" => $user->Usr_Id, "Usr_Login" => $user->Usr_Login), $user->statusCode);
            } else {
                $user->statusCode = 401;
            }
        }
        return response()->json(array("Usr_Login" => $login), $user->statusCode);
    }

    private function checkHashSHA($login, $password, $salt, $encryptedPassword) {
        return password_verify($salt.$password.$salt, $encryptedPassword);
    }
}

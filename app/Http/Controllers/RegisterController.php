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
        $user = new User($content["Usr_Login"], $content["Usr_Password"], $content["Usr_Salt"]);

        die($user->addUser());


        return response()->json($user, 201);
    }
}

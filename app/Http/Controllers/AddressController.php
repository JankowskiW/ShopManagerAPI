<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    // GET: api/addresses
    public function getAllAddresses()
    {
        return response()->json(Address::get(), 200);
    }

    // GET: api/addresses/{id}
    public function getAddress($id)
    {
        return response()->json(Address::where('Adr_Id', $id)->first(), 200);
    }

    // POST: api/addresses
    public function addAddress(Request $request)
    {
        if(empty($request->getQueryString()))
        {
            // Tu trzeba pomyśleć jak zrobić, żeby można było przekazać parametry do posta w jsonie
            $content = json_decode($request->getContent(),true);
            // $address = new Address($content["Adr_Country"], $content["Adr_State"], $content["Adr_City"], $content["Adr_PostalCode"], $content["Adr_Address"]);
            // $address->create();
        } else
        {
            // pobiera dane z nagłówka
            $address = Address::create($request->all());
        }

        return response()->json($address, 201);
    }

    // PUT: api/addresses/{address}
    public function editAddress(Request $request, Address $address)
    {
        // tutaj update robi pobierając dane z nagłówka, jeśli nie istnieje podany ID to nie tworzy nowego rekordu
        $address->update($request->all());
        return response()->json($address, 200);

        // tutaj robi update pobierając dane z body a id z nagłówka, jeśli nie istnieje podany ID to tworzy nowy rekord
        // TODO: zrobić w taki sposób, żeby nie tworzyło nowego rekordu, jeśli nie ma istniejacego id.
//        $address = Address::firstOrNew(['Adr_Id' => $id]);
//        $content = json_decode($request->getContent(),true);
//
//        $address->Adr_Country = isset($content["Adr_Country"]) ? $content["Adr_Country"] : $address->Adr_Country;
//        $address->Adr_State = isset($content["Adr_State"]) ? $content["Adr_State"] : $address->Adr_State;
//        $address->Adr_City = isset($content["Adr_City"]) ? $content["Adr_City"] : $address->Adr_City;
//        $address->Adr_PostalCode = isset($content["Adr_PostalCode"]) ? $content["Adr_PostalCode"] : $address->Adr_PostalCode;
//        $address->Adr_Address = isset($content["Adr_Address"]) ? $content["Adr_Address"] : $address->Adr_Address;
//
//        $address->save();
    }

    // DELETE: api/addresses/{address}
    public function deleteAddress(Request $request, Address $address)
    {
        $address->delete();
        return response()->json(null, 204);
    }
}

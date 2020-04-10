<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "addresses";
    public $primaryKey  = 'Adr_Id';

    public $timestamps = false;

    protected $fillable = [
        'Adr_Id',
        'Adr_Country',
        'Adr_State',
        'Adr_City',
        'Adr_PostalCode',
        'Adr_Address'
    ];
}

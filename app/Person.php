<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";
    public $primaryKey  = 'Prs_Id';

    public $timestamps = false;

    protected $fillable = [
        'Prs_Id',
        'Prs_AdrId',
        'Prs_FirstName',
        'Prs_SecondName',
        'Prs_LastName',
        'Prs_BirthDate',
        'Prs_PhoneNumber',
        'Prs_EmailAddress'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    public $primaryKey  = 'Emp_Id';

    public $timestamps = false;

    protected $fillable = [
        'Emp_Id',
        'Emp_PrsId',
        'Emp_ComId',
        'Emp_Position',
        'Emp_Department',
        'Emp_NationalIdNum',
        'Emp_GrossSalary',
        'Emp_HireDate',
        'Emp_ContractType',
        'Emp_ContractDuration'
    ];
}

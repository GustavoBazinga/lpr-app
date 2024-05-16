<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    //Choose connection
    protected $connection = 'mc_sqlsrv';

    //Choose table
    protected $table = 'dbo.Members';

    //Choose primary key
    protected $fillable = [
        'Id',
        'Title',
        'Barcode',
        'Name',
        'Titular',
        'MobilePhone',
    ];

    

}

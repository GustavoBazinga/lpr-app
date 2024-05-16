<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    //Choose connection
    protected $connection = 'mc_sqlsrv';

    //Choose table
    protected $table = 'dbo.RatchetAccesses';

    protected $fillable = [
        'Id',
        'Ratchet',
        'Member',
        'Barcode',
        'Date',
        'Authorization'
    ];
}

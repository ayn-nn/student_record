<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ayn extends Model
{
    use HasFactory;
    protected $table = "studinfo";
    protected $primaryKey = 'StudID';
    public $timestamps = false;
    protected $fillable = [
        'FirstName',
        'MiddleName',
        'LastName',
        'Address',
        'Age'
    ];

}

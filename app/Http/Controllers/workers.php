<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ayn;

class workers extends Controller
{
    public function index(){
        return view("Workers.index");
    }
}

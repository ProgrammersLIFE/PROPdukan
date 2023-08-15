<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class propertiesController extends Controller
{
    public function create(){
        return view("admin/pages/properties/create");
    }
}

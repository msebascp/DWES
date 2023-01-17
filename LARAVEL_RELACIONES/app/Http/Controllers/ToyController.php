<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use Illuminate\Http\Request;

class ToyController extends Controller
{
    public function pet(Request $request, $id)
    {
        return Toy::find($id)->pet;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function owner(Request $request, $id)
    {
        return Pet::find($id)->owner;
    }
    public function toys(Request $request, $id)
    {
        return Pet::find($id)->toys;
    }
}

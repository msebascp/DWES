<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Pet;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function pet(Request $request, $id)
    {
        return Owner::find($id)->pet;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request) {
        $temp = $request->input("project");
        return response()->json(['temp'=>$temp]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name'=>['required','string','max:255'],
            'description'=>['required','string'],
        ]);
        $project = new Project();
        $project->name = $request->name;    
        $project->description = $request->description;  
        $project->save();
        return redirect('dashboard')->with('success','Project created successfully!');
    }
}

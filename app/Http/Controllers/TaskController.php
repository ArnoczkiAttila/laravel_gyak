<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
class TaskController extends Controller
{
    public function create(Request $request) {
        $title = $request->input("feladat_name");
        $description = $request->input("feladat_description");

        foreach ($request->input("project") as $projectData) {
            if (isset($projectData["checkbox"])) {
                $project = Project::find(intval($projectData["id"]));
                $task = new Task();
                $task->project_id = $project->id;
                $task->description = $description;
                $task->title= $title;
                $task->save();
                break;
            }
        }
        return redirect()->back()->with("success","fasza, sikerült");
    }
}

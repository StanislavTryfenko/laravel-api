<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('technologies', 'type')->orderByDesc('id')->paginate(3);
        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::with('technologies', 'type')->where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'project' => $project
        ]);
    }
}

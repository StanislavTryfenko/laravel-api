<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderByDesc('id')->get();
        return response()->json([
            'success' => true,
            'technologies' => $technologies
        ]);
    }
}

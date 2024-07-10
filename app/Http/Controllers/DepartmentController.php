<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Department::with('categories')->get());
    }

    public function show(Department $department)
    {
        return response()->json($department->load('categories'));
    }
}

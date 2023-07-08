<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index()
   {
       return response()->json(['data' => Task::all()]);
   }

   public function create(Request $request)
   {

   }
}

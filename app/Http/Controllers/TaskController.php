<?php

namespace App\Http\Controllers;

use App\Http\Resources\jResource;
use App\Http\Resources\TaskResourceCollection;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   public function index(TaskRepository $taskRepository, Request $request)
   {
       $arr = [];
       foreach ($taskRepository->all($request) as $item){
           $arr[] = new jResource($item);
       }
       //return new TaskResourceCollection($taskRepository->all($request));
       return new TaskResourceCollection($arr);
   }

   public function create(Request $request)
   {
       Task::create($request->toArray());
       return response()->json(['message' => 'Task successfully created'], 201);
   }
}

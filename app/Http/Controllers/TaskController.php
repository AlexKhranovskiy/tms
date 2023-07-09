<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResourceCollection;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected TaskRepository $taskRepository;
    protected Request $request;

    public function __construct(TaskRepository $taskRepository, Request $request)
    {
        $this->taskRepository = $taskRepository;
        $this->request = $request;
    }

    public function index()
    {
        return new TaskResourceCollection($this->taskRepository->all($this->request));
    }

    public function store()
    {
        return $this->taskRepository->store($this->request);
    }
}

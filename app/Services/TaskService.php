<?php


namespace App\Services;


use App\Http\Resources\TaskResourceCollection;
use App\Repositories\TaskRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskService
{
    protected TaskRepository $taskRepository;

    /**
     * TaskService constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param Request $request
     * @return TaskResourceCollection
     * @throws \Exception
     */
    public function getAll(Request $request): TaskResourceCollection
    {
        return new TaskResourceCollection($this->taskRepository->all($request));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        return $this->taskRepository->store($request);
    }
}

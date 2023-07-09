<?php


namespace App\Repositories;


use App\Models\Task;

class TaskRepository
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * @throws \Exception
     */
    public function all($request)
    {
        if (!$request->has('sort_field')) {
            return $this->task->all();
        } else {
            $sortParams = $request->get('sort_field');
            $query = Task::query();
            foreach ($sortParams as $key => $value) {
                switch ($key) {
                    case 'status':
                        switch ($value) {
                            case 'fresh':
                                $query->orderByRaw("FIELD(status, \"fresh\", \"done\")");
                                break;
                            case 'done':
                                $query->orderByRaw("FIELD(status, \"done\", \"fresh\")");
                                break;
                            default:
                                throw new \Exception('Wrong query.');
                        }
                        break;
                    case 'priority':
                        switch ($value) {
                            case 'high':
                                $query->orderByRaw("FIELD(priority, \"high\", \"low\")");
                                break;
                            case 'low':
                                $query->orderByRaw("FIELD(priority, \"low\", \"high\")");
                                break;
                            default:
                                throw new \Exception('Wrong query.');
                        }
                        break;
                    case 'created_at':
                        switch ($value) {
                            case 'desc':
                                $query->orderBy('created_at', 'desc');
                                break;
                            case 'asc':
                                $query->orderBy('created_at', 'asc');
                                break;
                            default:
                                throw new \Exception('Wrong query.');
                        }
                        break;
                    default:
                        throw new \Exception('Wrong query.');
                }
            }
            return $query->get();
        }
    }

    public function store($request)
    {
        $this->task->create($request->toArray());
        return response()->json(['message' => 'Task successfully created'], 201);
    }


}

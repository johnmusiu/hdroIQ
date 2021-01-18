<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskAssigned;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tasks = Task::with('user')->orderBy('created_at', 'ASC')->get();
        return response()->json(['tasks' => $tasks], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'date_due' => 'required|date|after:now',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 400);
        }


        $task = Task::create($request->all());

        return response()->json(['task' => $task], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id): Response
    {
        $task = Task::with('user')->find($id);
        return response(['task' => $task], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return JsonResponse
     */
    public function update(Request $request, Task $task): JsonResponse
    {
        $request->validate(
            []
        );

        if($task->user_id !== null){
            return response()->json(['error' => 'Cannot re-assign task. Task is assigned to: '. $task->user->name], 200);
        }
        if($request['user_id']){
            $user = User::findOrFail($request['user_id']);
            $task->update($request->all());
            $user->notify(new TaskAssigned($task));
        }else{
            $task->update($request->all());
        }

        return response()->json( $task, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(null, 204);
    }
}

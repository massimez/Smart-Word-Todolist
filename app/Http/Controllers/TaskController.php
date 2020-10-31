<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskController extends Controller
{
    public function index()
    {
        $result = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('todolist_id'),
                AllowedFilter::exact('id'),
                AllowedFilter::exact('completed'),
                AllowedFilter::exact('priority'),
            ])->allowedSorts('todolist_id', 'completed', 'priority', 'duedate')
            ->get();
        return $result;
    }

    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        //santitizing
        $this->validate($request, [
            'taskname' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:5',
            'duedate' => 'required|date',
            'priority' => 'numeric',
            'todolist_id' => 'numeric',
        ]);

        //Create a new task
        $task = new Task;
        //Assign the task data from the request
        $task->taskname = $request->taskname;

        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->priority = $request->priority;
        $task->todolist_id = $request->todolist_id;
        //Sava the task
        $task->save();


        return response()->json($task, 201);
    }


    public function show($id)
    {
        return task::find($id);
    }

    public function edit($id)
    {
        $todo = Task::find($id);
        return $todo;
    }


    public function update(Request $request, Task $id)
    {
        $this->validate($request, [
            'taskname' => 'string|max:255|min:3',
            'description' => 'string|max:10000|min:5',
            'duedate' => 'date',
        ]);
        $article = task::findOrFail($id);
        $article->update($request->all());

        return response()->json($article, 201);;
    }

    public function destroy($tasktodel)
    {
        $tasktodel = task::findOrFail($tasktodel);
        if ($tasktodel)

            $tasktodel->delete();
        else
            //return $this->session()->flash('status', 'Error');
            return response()->json(null);
    }

    public function markdone($id)
    {
        $id = task::findOrFail($id);

        if ($id && $id->completed == false) {
            $id->update(['completed' => true]);
        } elseif ($id->completed == true) {
            $id->update(['completed' => false]);
        }
        return response()->json("Succes", 200);
    }
}

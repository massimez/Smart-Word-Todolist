<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $result = QueryBuilder::for(task::class)
        //     ->allowedFilters('todolist-id', 'taskname', 'completed', 'priotiy')
        //     //->defaultSort('-id')
        //     ->allowedSorts('todolist-id', 'taskname', 'completed', 'priotiy')

        //     ->get();

        $result = QueryBuilder::for(task::class)
            ->allowedFilters([
                AllowedFilter::exact('todolist-id'),
                AllowedFilter::exact('id'),
                AllowedFilter::exact('completed'),
                AllowedFilter::exact('priority'),
            ])
            ->get();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //santitizing
        $this->validate($request, [
            'taskname' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:5',
            'duedate' => 'required|date',
            'priority' => 'numeric',
            'todolist-id' => 'numeric',
        ]);
        //Create a new task
        $task = new Task;
        //Assign the task data from the request
        $task->taskname = $request->taskname;

        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->priority = $request->priority;

        //Sava the task
        $task->save();
        //Flash with succes
        $request->session()->flash('status', 'Successful!');
        //Return a Redirect
        return response()->json($task, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'taskname' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:5',
            'duedate' => 'required|date',
            'priority' => 'numeric',
        ]);
        //Create a new task
        $task = new Task;
        //Assign the task data from the request
        $task->taskname = $request->taskname;

        $task->description = $request->description;
        $task->duedate = $request->duedate;
        $task->priority = $request->priority;

        //Sava the task
        $task->save();
        //Flash with succes
        $request->session()->flash('status', 'Successful!');
        //Return a Redirect
        //return task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return task::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = task::find($id);
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $id)
    {
        $this->validate($request, [
            'taskname' => 'string|max:255|min:3',
            'description' => 'string|max:10000|min:5',
            'duedate' => 'date',
        ]);
        //$id->update(['name' => $request->name]);
        $article = task::findOrFail($id);
        $article->update($request->all());

        return response()->json($article, 201);;
        //return redirect()->back()->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tasktodel)
    {
        $tasktodel = task::findOrFail($tasktodel);
        if ($tasktodel)
            $tasktodel->delete();
        else
            return $this->session()->flash('status', 'Error');
        return response()->json(null);
    }

    public function markdone($id)
    {
        $id = task::findOrFail($id);
        if ($id)
            $id->update(['completed' => true]);

        return $this->session()->flash('status', 'Completed');
    }
}

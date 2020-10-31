<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use App\Http\Resources\TodolistResource;
use Illuminate\Http\Request;


class TolistController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $array2 = array();

        // foreach ($todolists as $todolist) {
        //     $toshow1 = $todolist->todolistname;
        //     //echo "<h1>" . $toshow1 . "</h1>";
        //     array_push($array, $toshow1);
        //     foreach ($todolist->tasks as $task) {
        //         $toshow2 = $task->taskname;
        //         //echo "<p>" . $toshow2 . "</p>";
        //         //$arraylist[$toshow1] = $toshow2;
        //         array_push($array2, $toshow2);
        //     }
        //     array_push($array, $array2);
        // }

        return TodolistResource::collection(todolist::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //santitizing
        $this->validate($request, [
            'todolistname' => 'required|string|max:255|min:3',
        ]);

        //Create a new task
        $todolist = new todolist;
        //Assign the task data from the request
        $todolist->todolistname = $request->todolistname;

        //Sava the task
        $todolist->save();
        //Flash with succes
        // $request->session()->flash('status', 'Todolist was successful!');
        //Return a Redirect
        return response()->json($todolist, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return todolist::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'todolistname' => 'string|max:255|min:3',
        ]);
        $id = todolist::findOrFail($id);
        $id->update(['todolistname' => $request->name]);

        return response()->json($id, 201);
        //return redirect()->back()->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = todolist::findOrFail($id);
        if ($id) {

            $id->delete();
        }


        return response()->json(null, 204);
    }
}

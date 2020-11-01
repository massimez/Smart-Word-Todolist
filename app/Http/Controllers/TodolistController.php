<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodolistResource;
use Illuminate\Http\Request;
use App\Models\Todolist;


class TodolistController extends Controller
{

    public function index()
    {

        return TodolistResource::collection(todolist::all());
    }


    public function create()
    {
    }

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
        return response()->json($todolist, 201);
    }

    public function show($id)
    {

        return todolist::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'todolistname' => 'string|max:255|min:3',
        ]);
        $id = todolist::findOrFail($id);
        $id->update(['todolistname' => $request->name]);

        return response()->json($id, 201);
    }


    public function destroy($id)
    {
        $id = todolist::findOrFail($id);
        if ($id) {

            $id->delete();
        }


        return response()->json(null, 204);
    }
}

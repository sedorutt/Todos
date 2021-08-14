<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function show(Todo $todo)
    {
        return $todo;
    }

    public function store(Request $request)
    {
        return Todo::create($request->all());
    }

    public function update(Request $request)
    {
        Todo::where("id", $request->id)->update([
            'title' => $request->title,
            'created_at' => Carbon::now()
        ]);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return $todo;
    }
}

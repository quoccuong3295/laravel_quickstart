<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Task;
use App\Http\Requests\RequestName;
use Illuminate\Http\Request;
use Mockery\Exception;
use Validator;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', compact('tasks')); //use compact to transfer data to view
    }
    public function store(RequestName $request){
        // Create The Task...
        try {
            $task = new Task;
            $task -> name = $request->name;
            $task->save();

            return redirect()->route('resource.index');
        } catch (Exception $e) {
            return back();
        }
}
    public function destroy($id)
    {
        try {
            $task = Task::find($id);
            $task->delete();

            return redirect()->route('resource.index');
        } catch (Exception $e) {
            return back();
        }
    }
}


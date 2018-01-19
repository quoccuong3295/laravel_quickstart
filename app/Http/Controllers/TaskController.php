<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Task;
use App\Models;
use App\Http\Requests\RequestName;
use Illuminate\Http\Request;
use Mockery\Exception;
use Validator;
use App\Repositories\TaskRepository;
class TaskController extends Controller
{
    protected $tasks;
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }
    public function index(Request $request){
        return view('resource.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }
    public function store(RequestName $request){
        // Create The Task...
        try {
            $request->user()->tasks()->create([
                'name' => $request->input('name'),
            ]);
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

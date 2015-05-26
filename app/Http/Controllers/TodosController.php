<?php namespace App\Http\Controllers;


use Mail;
use Carbon;
use App\Todo;
use App\User;
use App\Project;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoFormRequest;

class TodosController extends Controller {


    /**
     * Require authentication for all methods
     */
    function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Project $project)
	{
        return view('todos.index', compact('project'));
	}

    /**
     * Display a listing of all Todos.
     *
     * @return Response
     */
    public function all()
    {
        $todos = Todo::all();
        return view('todos.all', compact('todos'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Project $project)
	{
        return view('todos.create', compact('project'));

    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Project $project, TodoFormRequest $request)
	{
        $input = array_except(\Input::all(), '_method');

        if (!isset($input['completed'])) $input['completed'] = 0;
        if (!isset($input['urgent'])) $input['urgent'] = 0;

        $todo = Todo::create($input);

        $emails = $project->subscribers()->lists('email');

        if (count($emails))
        {
            Mail::send('todos.emails.create', ['name' => $todo->name,'user' => $todo->user->name], function($message) use ($emails,$todo)
            {
                $message->from('info@laireight.com');
                $message->to($emails)->subject("USC Todo App - The ". $todo->project->name . " project has been updated.");
            });
        }

        Flash::success('Your todo has been created!');
        return redirect()->route('projects.todos.index', [ $project->id ]);
	}

    /**
     * Display the specified resource.
     *
     * @param Todo $todo
     * @internal param int $id
     * @return Response
     */
	public function show(Project $project, Todo $todo)
	{
        return view('todos.show', compact('project', 'todo'));
	}


    /**
     * Show the form for editing the specified resource.
     *
     * @param Todo $todo
     * @internal param int $id
     * @return Response
     */
	public function edit(Project $project, Todo $todo)
	{
        return view('todos.edit', compact('project', 'todo'));
	}


    /**
     * Update the specified resource in storage.
     *
     * @param Todo $todo
     * @internal param int $id
     * @return Response
     */
	public function update(Project $project, User $user, Todo $todo)
	{

        $input = array_except(\Input::all(), '_method');

        if (isset($input['completed'])) {

            $input['urgent'] = 0;

            $emails = $project->subscribers()->lists('email');

            if (count($emails))
            {
                Mail::send('todos.emails.update', ['name' => $todo->name,'user' => \Auth::user()->name], function($message) use ($emails,$todo)
                {
                    $message->from('info@laireight.com');
                    $message->to($emails)->subject("USC Todo App - The ". $todo->project->name . " project has been updated.");
                });
            }

        } else {

            $input['completed'] = 0;

        }

        $todo->update($input);

        Flash::success('Your todo has been updated!');
        return redirect()->route('projects.todos.index', [ $project->id ]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @internal param int $id
     * @return Response
     */
	public function destroy(Project $project, Todo $todo)
	{
		$todo->delete();

        Flash::success('Your todo has been deleted!');
        return redirect()->route('projects.todos.index', [ $project->id ]);

	}

}

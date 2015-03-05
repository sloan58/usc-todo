<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\TodoFormRequest;
use App\Todo;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Carbon;

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

        Todo::create($input);

        Flash::message('Your todo has been created!');
        return redirect()->route('projects.show', [ $project->id ]);
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

        if (!isset($input['completed'])) $input['completed'] = 0;
        if (!isset($input['urgent'])) $input['urgent'] = 0;

		$todo->update($input);

        Flash::message('Your todo has been updated!');
        return \Redirect::refresh();
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

        Flash::message('Your todo has been deleted!');
        return redirect()->route('projects.show', [ $project->id ]);

	}

}

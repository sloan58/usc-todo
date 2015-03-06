<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Todo;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\ProjectFormRequest;

class ProjectController extends Controller {


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
	public function index()
	{
        $projects = Project::Paginate(18);
		return view('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProjectFormRequest $request)
	{
        $project = Project::create(\Request::all());

        Flash::success('Your project has been created.  Now add some Todos!');
        return view('todos.index', compact('project'));
	}

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @internal param int $id
     * @return Response
     */
	public function show(Project $project)
	{
        return view('projects.show', compact('project'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @internal param int $id
     * @return Response
     */
	public function edit(Project $project)
	{
        return view('projects.edit', compact('project'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @internal param int $id
     * @return Response
     */
	public function update(ProjectFormRequest $request)
	{
		//
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @internal param int $id
     * @return Response
     */
	public function destroy(Project $project)
	{

        if($project->todos)
        {
           foreach($project->todos as $todos)
           {
               if(!$todos->completed)
               {
                   Flash::error('This project has incomplete todos.  Mark them as complete or remove them.');
                   return redirect()->route('projects.todos.index', [ $project->id ]);
               }
           }
        }

        $project->delete();

        Flash::success('The project has been deleted!');
        return redirect()->route('projects.index');

	}

}

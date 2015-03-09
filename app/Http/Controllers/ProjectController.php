<?php namespace App\Http\Controllers;

use App\Commands\CreateProjectCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\Todo;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Http\Requests\ProjectFormRequest;
use Mail;

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

//        $this->dispatch(new CreateProjectCommand(\App\User::find('51'),\Request::only('name')));

        $project = Project::create(\Request::all());
        $project_array = $project->toArray();

        $emails = \DB::table('users')->lists('email');

        Mail::send('projects.emails.create', ['name' => $project->name,'user' => $project->user->name], function($message) use ($emails,$project_array)
        {
            $message->from('info@laireight.com');
            $message->to($emails)->subject("USC Todo App - a new project '$project_array[name]' has been added!");
        });


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
                   Flash::error('This project has incomplete todos.  Mark them as completed or remove them.');
                   return redirect()->route('projects.todos.index', [ $project->id ]);
               }
           }
        }

        $project->delete();

        Flash::success('The project has been deleted!');
        return redirect()->route('projects.index');

	}

}

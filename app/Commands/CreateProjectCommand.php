<?php namespace App\Commands;

use App\Commands\Command;

use App\User;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateProjectCommand extends Command implements SelfHandling {

    public $user;
    public $name;
    /**
     * Create a new command instance.
     *
     * @param User $user
     * @param $name
     * @return \App\Commands\CreateProjectCommand
     */
	public function __construct(User $user, $name)
	{

        $this->user = $user;
        $this->name = $name;

	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
        dd($this->user->email);

    }

}

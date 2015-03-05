<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTodosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('todos', function($table)
        {
            $table->string('due_date')
                ->after('name')
                ->default(Carbon\Carbon::now()->addWeek());
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('todos', function($table)
        {
            $table->dropColumn('due_date');
        });
	}

}

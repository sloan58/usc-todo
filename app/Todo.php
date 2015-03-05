<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {


    /**
     * Gaurded fields for a new Todo
     *
     * @var array
     */
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

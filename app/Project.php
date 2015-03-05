<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {


    /**
     * Fillable fields for a new Project
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

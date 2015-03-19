<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {


    /**
     * Fillable fields for a new Project
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    /*
     * A Project has many Todos
     */
    public function todos()
    {
        return $this->hasMany('App\Todo');
    }

    /*
     * A Project has many subscribers
     */
    public function subscribers()
    {
        return $this->belongsToMany('App\User');
    }

    public function alreadySubscribed($userId)
    {
        return ! is_null(
            $this->subscribers()
                ->where('user_id', $userId)
                ->first()
        );
    }

    /*
     * A Project belongs to a User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

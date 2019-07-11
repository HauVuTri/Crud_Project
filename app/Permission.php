<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany('App\User','id_permission','id');
    }
}

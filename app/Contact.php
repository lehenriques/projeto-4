<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function email()
    {
        return $this->hasMany('App\Email');
    }

    public function telephones()
    {
        return $this->hasMany('App\Telephone');
    }
}

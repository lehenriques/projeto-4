<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelephoneType extends Model
{
    protected $fillable = [
        'name'
    ];


    public function telephones()
    {
        return $this->hasMany('App\Telephone');
    }
}

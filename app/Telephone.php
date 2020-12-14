<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    protected $fillable = [
        'telephone', 'contact_id', 'telephone_type_id'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function type_telephone()
    {
        return $this->belongsTo('App\TelephoneType');
    }
}

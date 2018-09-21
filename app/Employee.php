<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'post', 'date_of_employment', 'wage', 'chief_id', 'photo'];

    public $timestamps = false;


    public function subordinates()
    {

        return $this->hasMany(self::class, 'chief_id');
    }


    public function chiefs()
    {
        return $this->belongsTo(self::class, 'chief_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'address','zip','city','states_id','mobile','phone','email','level_id','section_id','age'
    ];


//    public function getLastNameAttribute()
//    {
//        return $this->last_name . ', ' . $this->first_name;
//    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }


}

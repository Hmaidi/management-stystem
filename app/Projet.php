<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'name', 'email','phone','address','experience','photo','advanced_salary','vacation','city'
    ];

    public function advanced_Projet()
    {
        return $this->hasMany(Advanced_Salary::class);
    }


    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}

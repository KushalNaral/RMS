<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'OS',
            'Numerical_Method',
            'DBMS',
            'SE',
             'Scripting'
        ];


    public function user()
    {
        return $this->hasMany(User::class);
    }
}

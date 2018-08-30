<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userblogs extends Model
{
    protected $fillable = ['title', 'body','uid'];
}

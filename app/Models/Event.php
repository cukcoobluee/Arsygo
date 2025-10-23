<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Event.php
    protected $fillable = ['title','date','price','time','location','slots','month','image'];
}

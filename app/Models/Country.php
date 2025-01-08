<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'Country';

    protected $primaryKey = 'Code';

    //    protected $hidden = ['Population'];
}

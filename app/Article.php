<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Article extends Model
{
    use Resizable;
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}



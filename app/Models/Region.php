<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Region extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function articles() {
        return $this->hasMany('App\Models\Article');
    }

}

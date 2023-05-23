<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class ExternalLinks extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'link',
    ];
    public function article() {
        return $this->belongsToMany('App\Models\Article');
    }

}

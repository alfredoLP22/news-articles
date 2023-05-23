<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Article extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'category_id',
        'region_id'
    ];
    public $relationships = array('region', 'category');

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function region() {
        return $this->belongsTo('App\Models\Region');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    public function externalLinks() {
        return $this->belongsToMany('App\Models\ExternalLinks');
    }

    public function getRentalObjects(): string
    {
        $users = User::all();
        foreach ($users as $user) {
            $rentalObjects = $user->rentalObjects;
            foreach ($rentalObjects as $rentalObject) {
                $objectsNames = $rentalObject->name;
            }
            $objects = implode(",", array($objectsNames));
        }
        return $objects;
    }
}

<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Nicolaslopezj\Searchable\SearchableTrait;


class Module extends Model
{
    use SearchableTrait;
    protected $searchable = [
        'columns' => [
            'permissions.name' => 100,
            'permissions.description' => 101,
        ],
    ];
    protected $fillable = ['link_name','status','name','description'];
}

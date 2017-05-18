<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class RelationModule extends Model
{
    protected $fillable = ['second_field_name','first','second','merge_folder','relation_type'];
}

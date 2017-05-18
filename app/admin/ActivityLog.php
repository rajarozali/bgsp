<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ActivityLog extends Model
{
    use SearchableTrait;
    protected $searchable = [
        'columns' => [
            'activity_logs.content_type' => 100,
            'activity_logs.content_id' => 101,
            'activity_logs.action' => 101,
            'activity_logs.description' => 101,
            'activity_logs.details' => 101,
            'activity_logs.data' => 101,
            'activity_logs.language_key' => 101,
            'activity_logs.public' => 101,
            'activity_logs.developer' => 101,
            'activity_logs.ip_address' => 101,
            'activity_logs.user_agent' => 101,
        ],
    ];
    protected $fillable = ['content_type','content_id','action','description','details','data','language_key','public','developer','ip_address','user_agent'];
}

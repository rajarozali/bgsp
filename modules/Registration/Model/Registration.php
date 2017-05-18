<?php

namespace Registration\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
#####use
 
class Registration extends Model
{
  use SearchableTrait;
    public $table = 'registrations';
    
	
	 public $searchable = [
	    'columns' => [
            'registrations.name'=>100,
    'registrations.email'=>101,
    'registrations.oneimage'=>102,
        ########relation_id
        ],
        ########join
	  ];
 

    public $fillable = [
        'name',
        'email',
        'oneimage',
        
    ];

 

    /**
     * Validation rules
     *
     * @var array
     */
    public   $rules = [
        'name' => 'required',
        'email' => 'email'
    ];
 #####relation#####
}

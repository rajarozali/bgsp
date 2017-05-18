<?php

namespace ReportBuilder\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;
#####use
 
class ReportBuilder extends Model
{
  use SearchableTrait;
    public $table = 'report_builders';
    
	
	 public $searchable = [
	    'columns' => [
            'report_builders.reportname'=>100,
    'report_builders.Description'=>101,
        ########relation_id
        ],
        ########join
	  ];
 

    public $fillable = [
        'reporttext'

    ];

 

    /**
     * Validation rules
     *
     * @var array
     */
    public   $rules = [

    ];
 #####relation#####
}

<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent {

  protected $connection = 'mongodb';
  protected $collection = 'tasks_collection';

   protected $fillable = [
        'name',
        
    ];

}

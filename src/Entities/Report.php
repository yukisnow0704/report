<?php

namespace Src\Entities;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $guarded = array();
    const ENTITY_TITLE = '構成';
    public static $rules = array();

}

<?php

namespace Src\Entities;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';

    protected $guarded = array();
    const ENTITY_TITLE = 'URL';
    public static $rules = array();

}

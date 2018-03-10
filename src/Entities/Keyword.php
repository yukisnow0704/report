<?php

namespace Src\Entities;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $table = 'keywords';

    protected $guarded = array();
    const ENTITY_TITLE = 'キーワード';
    public static $rules = array();

}

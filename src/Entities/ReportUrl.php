<?php

namespace Src\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportUrl extends Model
{
    protected $table = 'report_url';

    protected $guarded = array();
    const ENTITY_TITLE = '構成_Url';
    public static $rules = array();

}

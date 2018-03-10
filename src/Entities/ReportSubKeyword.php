<?php

namespace Src\Entities;

use Illuminate\Database\Eloquent\Model;

class ReportSubKeyword extends Model
{
    protected $table = 'report_subkeyword';

    protected $guarded = array();
    const ENTITY_TITLE = '構成_サブキーワード';
    public static $rules = array();

}

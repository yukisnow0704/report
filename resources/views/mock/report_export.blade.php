@extends('layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">請求書一覧</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        構成エクスポート
                    </div>
                    <div class="panel-body">
                        <input type="date" value="" name="startDate" class="startDate" style="margin:10px;"> ~ <input type="date" value="" name="endDate" class="endDate" style="margin:10px;">
                        <button class="btn btn-success pull-right" style="margin:10px;">エクスポート</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

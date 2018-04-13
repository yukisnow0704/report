@extends('layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">構成エクスポート</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        構成エクスポート
                    </div>
                    <div class="panel-body">
                        <form action="/report/exportcsv" method="get" enctype="multipart/form-data">
                            <!-- <input type="date" value="" name="startDate" class="startDate" style="margin:10px;"> ~ <input type="date" value="" name="endDate" class="endDate" style="margin:10px;"> -->
                                <div class="row" style="display:inline-flex">
                                    <div class="col-md-2">
                                        <select id="year" class="form-control" name="year" style="width:100px;">
                                            <option value="">年</option>
                                            @for ($i = 2017; $i <= 2030; $i++)
                                            <option value="{{ $i }}"@if(old('year') == $i) selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="month" class="form-control" name="month" style="width:100px;">
                                            <option value="">月</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"@if(old('month') == $i) selected @endif>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            <button class="btn btn-success pull-right" style="margin:10px;" type="submit">エクスポート</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

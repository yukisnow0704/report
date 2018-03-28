@extends('layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">構成インポート</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        構成インポート
                    </div>
                    <div class="panel-body">
                        @if (session('csv_error_message'))
                            <form action="/report/importcsv" method="post" enctype="multipart/form-data">
                                <input type="file" value="ファイルを選択" style="margin:10px;" accept='.csv' name="csvfile">
                                {{ csrf_field() }}
                                <button class="btn btn-success pull-right" style="margin:10px;" type="submit">インポート</button>
                                <div class="alert alert-danger">{{ session('csv_error_message') }}</div>
                            </form>
                        @else
                            @if (session('csv_message'))
                                <form action="/report/importcsv" method="post" enctype="multipart/form-data">
                                    <input type="file" value="ファイルを選択" style="margin:10px;" accept='.csv' name="csvfile">
                                    {{ csrf_field() }}
                                    <button class="btn btn-success pull-right" style="margin:10px;" type="submit">インポート</button>
                                    <div class="alert alert-success">{{ session('csv_message') }}</div>
                                </form>
                            @else
                                <form action="/report/importcsv" method="post" enctype="multipart/form-data">
                                    <input type="file" value="ファイルを選択" style="margin:10px;" accept='.csv' name="csvfile">
                                    {{ csrf_field() }}
                                    <button class="btn btn-success pull-right" style="margin:10px;" type="submit">インポート</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

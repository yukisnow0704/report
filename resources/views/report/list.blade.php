@extends('layouts.app')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">請求書一覧</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        構成一覧
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <a href="/report/import" class="btn btn-success">記事インポート</a>
                        <a href="/report/csv" class="btn btn-success" download="reports.csv">一覧DL</a>
                        <a href="/report/csv" class="btn btn-success" target="_blank">一覧DL(tab)</a>
                        <a href="/report/export" class="btn btn-success">記事DL</a>
                    </div>
                    <!-- <div class="table-responsive"> -->
                        <table ui-jq="dataTable" ui-options="{
                                'language': {
                                    'lengthMenu': '_MENU_',
                                    'search': '検索 ',
                                    'emptyTable': 'データはありません。',
                                    'info': ' ',
                                    'infoFiltered': '(全 _MAX_ 件)',

                                    'sProcessing': '処理中...',
                                    'sLengthMenu': '_MENU_ 件表示',
                                    'sZeroRecords': 'データはありません。',
                                    'sInfo': ' _TOTAL_ 件中 _START_ から _END_ まで表示',
                                    'sInfoEmpty': ' 0 件中 0 から 0 まで表示',
                                    'sInfoFiltered': '（全 _MAX_ 件）',
                                    'sInfoPostFix': '',
                                    'sSearch': '検索:',
                                    'sUrl': '',
                                    'oPaginate': {
                                        'sFirst': '先頭',
                                        'sPrevious': '前',
                                        'sNext': '次',
                                        'sLast': '最終'
                                    }
                                }
                            }" class="table table-striped b-t b-b" style="width:100%;">
                            <thead>
                            <tr>
                                <th>ファイル名</th>
                                <th>インポート日時</th>
                                <th>No</th>
                                <th>納品年月</th>
                                <th>キーワード</th>
                                <th>種別</th>
                                <th>URL</th>
                                <th>担当者</th>
                                <th>更新日時</th>
                                <th>完了</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td>{{ $report['filename'] }}</td>
                                    <td>{{ $report['import_at'] }}</td>
                                    <td>{{ $report['no'] }}</td>
                                    <td>{{ $report['request_date'] }}</td>
                                    <td>{{ $keywords[$report['keyword_id']]['keyword'] }}</td>
                                    <td></td>
                                    <td><a href="/contact/report/{{ $report['token'] }}">/contact/report/{{ $report['token'] }}</a></td>
                                    <td>{{ $report['user_id'] }}</td>
                                    <td>{{ $report['updated_at'] }}</td>
                                    <td>{{ $report['complate_at'] }}</td>
                                    <td>
                                        <a href="/report/edit/{{ $report['token'] }}" class="btn btn-success">編集</a>
                                        <!-- <a href="/report/{{ $report['token'] }}" class="btn btn-danger">削除</a> -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

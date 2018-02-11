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
                        構成一覧
                    </div>
                    <div class="table-responsive">
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
                            }" class="table table-striped b-t b-b">
                            <thead>
                            <tr>
                                <th style="width:20%">ファイル名</th>
                                <th style="width:15%">No</th>
                                <th style="width:15%">キーワード</th>
                                <th style="width:10%">種別</th>
                                <th style="width:10%">URL</th>
                                <th style="width:10%">担当者</th>
                                <th style="width:10%">完了</th>
                                <th style="width:20%"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>構成案サンプル0208.xlsx</td>
                                    <td> </td>
                                    <td> </td>
                                    <td>ベビーサイン</td>
                                    <td><a href="/contact/report/xxx">/contact/report/xxx</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="/report/xxxx" class="btn btn-success">編集</a>
                                        <a href="/report/xxxx" class="btn btn-danger">削除</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

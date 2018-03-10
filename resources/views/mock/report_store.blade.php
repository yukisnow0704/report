@extends('layouts.report')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">記事構成作成</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <form action="#" method="get">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            構成情報
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <label class="col-md-6">ファイル名</label>
                                <input type="text" name="filename" class="filename col-md-6">
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">NO</label>
                                <input type="number" name="no" class="no col-md-6">
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">キーワード</label>
                                <input type="text" name="keyword" class="keyword col-md-6">
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">担当者</label>
                                <select name="user">
                                    <option value="0">未選択</option>
                                    <option value="1">ユーザ1</option>
                                    <option value="2">ユーザ2</option>
                                    <option value="3">ユーザ3</option>
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">完了</label>
                                <select name="complate">
                                    <option value="0">未完了</option>
                                    <option value="1">完了</option>
                                </select>
                            </div>
                            <div class="col-md-12 sub-keyword-list">
                                <label class="col-md-12">サブキーワード</label>
                                <div class="col-md-12" style="margin-top:10px;">
                                    <input type="text" name="keyword1" class="keyword1 col-md-9">
                                    <div class="col-md-3">
                                        <a href="javascript:void(0);" class="btn btn-danger remove-keyword">
                                            <i class="fa fa-minus"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-success add-keyword" style="margin-left:5px;">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            構成一覧
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <label class="col-md-6">タイトル</label>
                                <input type="text" name="title" class="title col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            概要
                            <a href="javascript:void(0);" class="btn btn-success add-big-head">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12 big-head1">
                                <div class="form-group col-md-8">
                                    <label class="col-md-12">大見出し1</label>
                                    <input type="text" name="big-title1" class="col-md-12">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <label class="col-md-6">説明</label>
                                        <textarea name='big-content1' class="col-md-6"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <input type="hidden" class="big-head-number" value="1">
                                    <div class="col-md-9" style="margin-top:20px;">
                                        <a href="javascript:void(0);" class="btn btn-danger remove-big-head">
                                            <i class="fa fa-minus"></i> 大見出し削除
                                        </a>
                                    </div>
                                    <div class="col-md-9" style="margin-top:20px;">
                                        <a href="javascript:void(0);" class="btn btn-success add-middle-header">
                                            <i class="fa fa-plus"></i> 中見出し追加
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group middle-head">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            参考記事
                        </div>
                        <div class="panel-body url-list">
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-3 ">URL</label>
                                <input type="text" name="url1" class="url1 col-md-6">
                                <div class="col-md-3">
                                    <a href="javascript:void(0);" class="btn btn-danger remove-url">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <a href="javascript:void(0);" class="btn btn-success add-url" style="margin-left:5px;">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>                                        
                    <button class="btn btn-success submit">
                        送信
                    </button>
                </form>
            </div>
        </div>
    </div>
 
    <script src="{{ asset('js/report_store.js')}}"></script>


@endsection

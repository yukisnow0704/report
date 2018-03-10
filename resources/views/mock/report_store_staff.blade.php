@extends('layouts.report_staff')

@section('content')
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">記事構成作成</h1>
    </div>
    
    <div class="wrapper-md" ng-controller="FormDemoCtrl">
        <div class="row">
            <!-- <form action="#"> -->
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">                    
                        <div class="panel-heading">
                            構成情報
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <label class="col-md-6">ファイル名</label>
                                <span class="filename col-md-6">構成案サンプル0208.xlsx</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">NO</label>
                                <span class="no col-md-6">1</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">キーワード</label>
                                <span class="keyword col-md-6">ベビーサイン</span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">担当者</label>
                                <span class="keyword col-md-6"></span>
                            </div>
                            <div class="col-md-12" style="margin-top:10px;">
                                <label class="col-md-6">完了</label>
                                <span class="keyword col-md-6">未完了</span>
                            </div>
                            <div class="col-md-12 sub-keyword-list" style="margin-top:10px;">
                                <label class="col-md-6">サブキーワード</label>
                                <div class="col-md-6" style="margin-top:10px;">
                                    <span class="keyword1 col-md-12">いつから</span>
                                    <span class="keyword2 col-md-12">本</span>
                                    <span class="keyword3 col-md-12">体験</span>
                                    <span class="keyword4 col-md-12">ベビーサイン協会</span>
                                    <span class="keyword5 col-md-12">イオン</span>
                                    <span class="keyword6 col-md-12">種類</span>
                                    <span class="keyword7 col-md-12">おしまい</span>
                                    <span class="keyword8 col-md-12">おむつ</span>
                                    <span class="keyword9 col-md-12">痛い</span>
                                    <span class="keyword10 col-md-12">ごはん</span>
                                    <span class="keyword11 col-md-12">イオン</span>
                                    <span class="keyword12 col-md-12">ちょうだい</span>
                                    <span class="keyword13 col-md-12">おいしい</span>
                                    <span class="keyword13 col-md-12">食べる</span>
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
                                    <input type="text" name="title" class="col-md-12">
                                    <div class="col-md-12" style="margin-top:20px;">
                                        <label class="col-md-6">説明</label>
                                        <textarea class="col-md-6"></textarea>
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
                                <input type="text" name="url" class="url1 col-md-6">
                                <div class="col-md-3">
                                    <a href="javascript:void(0);" type="delete" class="btn btn-danger remove-url">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                    <a href="javascript:void(0);" type="add" class="btn btn-success add-url" style="margin-left:5px;">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <script src="{{ asset('js/report_store.js')}}"></script>

@endsection

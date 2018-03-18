$(document).ready(function () {

var focus = 0;
var json = [];
$(".panel-body").on("click", '.add-middle-header',function() {
    var bigKey = $(this).parent().parent().find('.big-head-number').val();
    var key = $('.big-head' + bigKey + ' > .middle-head' ).children().length;
    var middleKey = parseInt(key) + 1;
    var html = '<div class="form-group middle-head' + middleKey + ' col-sm-12">';
    html += '<div class="col-md-9">';
    html += '<label class="col-md-12">中見出し' + middleKey + '</label>';
    html += '<input type="text" name="middle-title" class="middle-title col-md-12">';
    html += '<label class="col-md-6">説明</label>';
    html += '<textarea class="middle-context col-md-6"></textarea>';
    html += '</div>';
    html += '<div class="col-md-3">';
    html += '<a href="javascript:void(0);" class="btn btn-danger remove-middle-header">';
    html += '<i class="fa fa-minus"></i>';
    html += '</a>';
    html += '</div>';
    html += '</div>';
    
    $('.big-head' + bigKey + ' > .middle-head' ).append(html);
});
$(".panel-body").on("click", '.remove-middle-header', function() {
    $(this).parent().parent().remove();
});
$(".panel-body").on("click", '.add-url',function() {
    var bigKey = $(this).parent().find('.big-head-number').val();
    var key = $('.url-list' ).children().length + 1;
    var html = '<div class="col-md-12" style="margin-top:10px;">';
    html += '<label class="col-md-3 ">URL</label>';
    html += '<input type="text" name="url" class="url col-md-6">';
    html += '<div class="col-md-3">';
    html += '<a href="javascript:void(0);" type="delete" class="btn btn-danger remove-url">';
    html += '<i class="fa fa-minus"></i>';
    html += '</a>';
    html += '<a href="javascript:void(0);" type="add" class="btn btn-success add-url" style="margin-left:5px;">';
    html += '<i class="fa fa-plus"></i>';
    html += '</a>';
    html += '</div>';
    html += '</div>';
    
    $('.url-list' ).append(html);
});
$(".panel-body").on("click", '.remove-url', function() {
    $(this).parent().parent().remove();
});
$(".panel-heading").on("click", '.add-big-head',function() {
    var key = $(this).parent().parent().find('.panel-body').children().length + 1;
    var html = '<div class="col-md-12 big-head' + key + '">';
    html += '<div class="form-group col-md-8">';
    html += '<label class="col-md-12">大見出し' + key + '</label>';
    html += '<input type="text" name="title" class="big-title col-md-12">';
    html += '<div class="col-md-12" style="margin-top:20px;">';
    html += '<label class="col-md-6">説明</label>';
    html += '<textarea class="big-context col-md-6"></textarea>';
    html += '</div>';
    html += '</div>';
    html += '<div class="col-md-4">';
    html += '<input type="hidden" class="big-head-number" value="' + key + '">';
    html += '<div class="col-md-9" style="margin-top:20px;">';
    html += '<a href="javascript:void(0);" class="btn btn-danger remove-big-head">';
    html += '<i class="fa fa-minus"></i> 大見出し削除';
    html += '</a>';
    html += '</div>';
    html += '<div class="col-md-9" style="margin-top:20px;">';
    html += '<a href="javascript:void(0);" class="btn btn-success add-middle-header">';
    html += '<i class="fa fa-plus"></i> 中見出し追加';
    html += '</a>';
    html += '</div>';
    html += '</div>';
    html += '<div class="form-group middle-head">';
    html += '</div>';
    html += '</div>';
    $(this).parent().parent().find('.panel-body').append(html);
});

$(".panel-body").on("click", '.remove-big-head', function() {
    $(this).parent().parent().parent().remove();
});

$(".panel-body").on("click", '.add-keyword',function() {
    var key = $('.sub-keyword-list').children().length + 1;

    var html = '<div class="col-md-12" style="margin-top:10px;">';
    html += '<input type="text" name="keyword' + key + '" class="keyword col-md-9">';
    html += '<div class="col-md-3">';
    html += '<a href="javascript:void(0);" type="delete" class="btn btn-danger remove-keyword">';
    html += '<i class="fa fa-minus"></i>';
    html += '</a>';
    html += '<a href="javascript:void(0);" type="add" class="btn btn-success add-keyword" style="margin-left:5px;">';
    html += '<i class="fa fa-plus"></i>';
    html += '</a>';
    html += '</div>';
    
    $('.sub-keyword-list').append(html);
});
$(".panel-body").on("click", '.remove-keyword', function() {
    $(this).parent().parent().remove();
});

var keyword = $('.keyword').val();
var subkeywords = keyword;
subkeywords += '\n\n';

$('.sub-keyword-list').children().each(function() {
    var subkeyword = $(this).find('.keyword').val();
    subkeywords += subkeyword;
    subkeywords += '\n';
});

$('#tmp-memo').val(subkeywords);

$('.submit').click(function() {
    var id = $('.id').val();
    var filename = $('.filename').val();
    var no = $('.no').val();
    var user_id = $('.user_id').val();
    var complate = $('.complate').val();
    var keyword = $('.keyword').val();
    var title = $('.title').val();

    // context
    var context = {};
    var count = 0;
    $('.context').children().each(function() {
        var min_context = {};
        var big_title = $(this).find('.big-title').val();
        var big_context = $(this).find('.big-context').val();

        min_context['title'] = big_title;
        min_context['context'] = big_context;
        min_context['middle'] = {};

        var middle_key = 0;
        $(this).find('.middle-head').children().each(function() {
            var min_middle_contexts = {};
            var middle_title = $(this).find('.middle-title').val();
            var middle_context = $(this).find('.middle-context').val();

            min_middle_contexts['title'] = middle_title;
            min_middle_contexts['context'] = middle_context;

            min_context['middle'][middle_key] = min_middle_contexts;
            middle_key++;
        });
        context[count] = min_context;
        count++;
    });

    var subkeywords = [];
    $('.sub-keyword-list').children().each(function() {
        var subkeyword = $(this).find('.keyword').val();
        subkeywords.push(subkeyword);
    });

    var urls = [];
    $('.url-list').children().each(function() {
        var url = $(this).find('.url').val();
        urls.push(url);
    });

    var values = {};
    values.filename = filename;
    values.no = no;
    values.user_id = user_id;
    values.complate = complate;
    values.keyword = keyword;
    values.title = title;
    values.context = JSON.stringify(context);
    values.subkeywords = subkeywords;
    values.urls = urls;
    
    
    $.ajax({
        'url': '/report/update/' + id,
        'type':'POST',
        'dataType': 'json',
        'data' : {'values' : values }
    }).done(function(data) {
        alert("更新が完了しました。");
        location.href('/report')
    }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
        alert("エラーが発生しました。");
    })
});  

})
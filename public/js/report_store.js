
var focus = 0;
var json = [];
$(".panel-body").on("click", '.add-middle-header',function() {
    var bigKey = $(this).parent().parent().find('.big-head-number').val();
    var key = $('.big-head' + bigKey + ' > .middle-head' ).children().length;
    var middleKey = parseInt(key) + 1;
    var html = '<div class="form-group middle-head' + middleKey + ' col-sm-12">';
    html += '<div class="col-md-9">';
    html += '<label class="col-md-12">中見出し' + middleKey + '</label>';
    html += '<input type="text" name="title" class="col-md-12">';
    html += '<label class="col-md-6">説明</label>';
    html += '<textarea class="col-md-6"></textarea>';
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
    html += '<input type="text" name="url" class="url' + key + ' col-md-6">';
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
    html += '<input type="text" name="title" class="col-md-12">';
    html += '<div class="col-md-12" style="margin-top:20px;">';
    html += '<label class="col-md-6">説明</label>';
    html += '<textarea class="col-md-6"></textarea>';
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
    html += '<input type="text" name="keyword' + key + '" class="keyword' + key + ' col-md-9">';
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

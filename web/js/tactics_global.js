$(function() {
	$('#dg').datagrid({
		url: 'get_data.php',
		rownumbers: true,
		singleSelect: false,
		pagination: true,
		pageSize: 20,
		pageList: [20, 40, 60, 80, 100],
		fit: true,
		fitColumns: true,
		toolbar: '#toolbar',
		idField: 'ID',
		nowrap: false,
		border: false
	});
});
//对记录进行搜索
function doSearch() {
	$('#dg').datagrid('load',{
		searchTactics: $('#searchTactics').val(),
		searchDetail: $('#searchDetail').val(),
		searchEnable: $('#searchEnable').val()
	});
}
//清空过滤
function back() {
	$('#dg').datagrid('load', {
	});
	$('#pForm').find('input').val('');
	$('#pForm').find('select').val('');
}
//取消选中
function unSelectAll() {
	$('#dg').datagrid('unselectAll');
}
$(function(){
	$('#notifications').dataTable({
		sPaginationType: 'full_numbers',
		aaSorting: [],
		sDom: '<"dataTables_options"lf>rtip',
		aoColumnDefs: [
			{
				bSortable: false,
				aTargets: [-1],
			},
		],
	});
});
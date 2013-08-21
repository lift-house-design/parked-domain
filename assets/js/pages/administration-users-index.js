$(function(){
	$('#users').dataTable({
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

	$('.dataTables_options')
		.append( $('#create-user').show() );

	$('.controls .remove.button').click(function(e){
		if(!confirm('Are you sure you want to remove that user?'))
		{
			e.preventDefault();
			return false;
		}
	});
});
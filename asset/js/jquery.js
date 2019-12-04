$(document).ready(function(){
	$('#tombol-cari').hide();
	$('#keyword').on('keyup', function(){
		$('#container').load('javascript/search.php?keyword=' + $('#keyword').val());
	});
});
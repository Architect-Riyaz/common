<script>
	$(function() {
	   // Remove active for all items.
	//$('.sidebar-menu li').removeClass('active');
	console.log($(this).closest('li'));
	var filename1 = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	var filename = filename1.replace("#", "");
	
	// highlight submenu item
	//$('li a[href="http://localhost' + this.location.pathname + '"]').addClass('active');
	$( 'li a[href*="'+filename+'"]' ).closest( "ul" ).css( "display", "block" );
	$('li a[href*="'+filename+'"]').css({'background-color':'gray','color':'white'});
	});
</script>
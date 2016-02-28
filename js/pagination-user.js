	$(document).ready(function(){
		
	//Loading Image Display
	function Display_Load()
	{
	    $("#loading").fadeIn(100);
		$("#loading").html("<img class='img-responsive center-block' src='images/loading.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	$(".pagination li:first").addClass('active');
	$("#content").load("data-user.php?page=1", Hide_Load());

	//Pagination Click
	$(".pagination li").click(function(){
		Display_Load();
		
		//CSS Styles
		$(".pagination li")
		
		$(".pagination > li").removeClass("active");
		$(this).addClass('active')
		


		//Loading Data
		var pageNum = this.id;
		$("#content").load("data-user.php?page=" + pageNum, Hide_Load());
	});
});


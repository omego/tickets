<? 
$res = mysql_query("select * from users where Username = '". $_SESSION['Username'] ."'");
$row111 = mysql_fetch_array($res);
$results = mysql_query("select * from tickets_entry where Engineer_Name = '". $row111['Real_Name'] ."' order by id DESC");




 ?>
<? include 'user-stats.php'; ?>



<div class="row">



		  <div class="col-md-12">
 <div id="content" >
	 <? include 'user-page.php'; ?>
		 
	 </div>

	</div> 


			
		  </div>
		</div>


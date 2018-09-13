<?php
	//blog frontend
	include '../header.php';
	include '../database/database.php';
	
	$link = 'Blog';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../nav/blog_nav.php';	
	
	if (isset($_GET['pageno'])) { 
		$pageno = $_GET['pageno']; 
	} else { 
		
		$pageno = 1; 
	}
	
	$no_of_records_per_page = 5; 
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	$cnt = "SELECT * from blog";
	$cmd_cnt = mysqli_query($connect, $cnt);
	$total_rows = mysqli_num_rows($cmd_cnt);
	
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	
	
		//
	$sel = "select * from blog ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";
	$cmd = mysqli_query($connect, $sel);
	
?>

<div class="page_wrapper_sub">




<table width="100%" cellpadding="10">
<tr bgcolor="">
<td align="center" valign="top" class="responsive" width="70%">
<div class="blog_wrapper">


<?
while($reso = mysqli_fetch_assoc($cmd)) {
$post_details = base64_decode($reso['post_details']);

?>


<div class="post-title">
<a class="post-link" href="<? echo slug($reso['slug'])?>"><? echo $reso['post_title'] ?></a>
</div>


<div class="post-body">
<? echo ( chop_string_blog($post_details , 300)) ?>
</div>


<div class="blog-action" >
<a href="<? echo slug($reso['slug'])?>" class="blog-action-color">Read more <i class="fa fa-angle-double-right"></i></a>
</div>


<!-- datas -->
<table width="100%" cellpadding="">
<tr bgcolor="">
<td align="left" width="25%">
<span class="post-data">
<i class="fa fa-clock-o"> <? echo now($reso['created']) ?></i>
</span>
</td>

<td align="left" width="25%">
<span class="post-data">
<i class="fa fa-bar-chart"> <? echo $reso['hits'] ?> views</i>
</span>
</td>

<td align="left" width="25%">
<span class="post-data">
<i class="fa fa-user-o"> <? echo $reso['firstname'].' ', $reso['lastname'] ?></i>
</span>
</td>

<td align="left" width="25%">
<span class="post-data">
<i class="fa fa-thumbs-o-up"> <? echo $reso['likes'] ?> likes</i>
</span>
</td>
</tr>
</table>
<br>
<br>

<?

}

?>



</div><!-- l -->
</td>


<td align="center" class="responsive" valign="top" width="30%">
<div class="blog-side">
sidebar
</div>
</td>

</tr>
</table>



<br>
<br>

		<center>
		<ul class="pagination"> 
		<li><a href="?pageno=1"><i class="fa fa-angle-double-left"></i> First</a></li> 
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"> 
			<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left"></i> Prev</a> 
		</li> 
		
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"> <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next <i class="fa fa-angle-right"></i></a></li> 
		
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last <i class="fa fa-angle-double-right"></i></a></li>
		
		</ul>
		</center>

</div><!-- m -->
<?
	include '../footer.php';
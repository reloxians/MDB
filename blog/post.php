<?php
	//blog post view
	if(isset($_GET['slug']) && $_GET['slug'] != null) {
		//
		include '../database/database.php' ;
		
		$slug = $_GET['slug'];
		//$rewrite = explode("/", $slug);
		//$new = $rewrite['1'];
		$sel = "select * from blog where slug='$slug' ";
		$cmd = mysqli_query($connect, $sel);
		$count = mysqli_num_rows($cmd);
		$reso = mysqli_fetch_assoc($cmd);		
		
		if($count < 1) {
			header("Location: /blog/");
			exit();
			
		} else {
			//update views
		
		$sel = "select * from blog where slug = '$slug' ";
		$cm = mysqli_query($connect, $sel);
		$rws = mysqli_fetch_assoc($cm);
		$hit = $rws['hits'];
		
		$add = $hit + 1;
		
		$ud = "update blog set hits = '$add' where slug = '$slug' ";
		$ud_cmd = mysqli_query($connect, $ud);		
		
		$sel = "select * from blog where slug = '$slug' ";
		$cm = mysqli_query($connect, $sel);
		$rwss = mysqli_fetch_assoc($cm);
		$new_hit = $rwss['hits'];
		
			//overview starts
			include '../header.php';
			$link = 'Blog';
			echo '<br>';
			echo '<br>';
			echo '<br>';
			include '../nav/blog_nav.php';	
			
		?>
		<div class="page_wrapper_sub">
		
		<table width="100%" cellpadding="10">
		<tr bgcolor="">
		<td align="center" valign="top" class="responsive" width="70%">
		<div class="blog_wrapper">
		
		<div class="post-title">
<? echo $reso['post_title'] ?>
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
<i class="fa fa-bar-chart"> <? echo $new_hit ?> views</i>
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
<!-- datas -->
<br>


<div class="post-body">
<? echo base64_decode($reso['post_details']) ?>
</div>


<!-- action -->
<br>
<table width="100%" cellpadding="5">
<tr bgcolor="">

<td class="responsive" valign="top" align="left" width="25%">
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" 
	 class="twitter-share-button" 
	 data-show-count="false">Tweet</a>
	 <script async src="https://platform.twitter.com/widgets.js" 
	 charset="utf-8">
	 </script>
</td>


<td class="responsive" valign="top" align="left" width="25%">
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script type="IN/Share"></script>
</td>

<td class="responsive" valign="top" align="left" width="25%">

<!-- Load Facebook SDK for JavaScript --> 
<div id="fb-root"></div> 

<script>(function(d, s, id) { 
	var js, fjs = d.getElementsByTagName(s)[0]; 
	if (d.getElementById(id)) return; 
	js = d.createElement(s); 
	js.id = id; 
	js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
	fjs.parentNode.insertBefore(js, fjs); 
	
	}(document, 'script', 'facebook-jssdk')); </script> 
<!-- Your like button code --> 
<? $current = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<div class="fb-like" data-href="<? echo $current ?>" 
data-layout="standard" 
data-action="like" 
data-show-faces="true">
</div>
</td>
</tr>
</table>
<!-- action -->
<br>
<br>
<!-- disqus -->
<?
include '../assets/disqus/main-comment.php';


?>

		
		
		</div><!-- l -->
		</td>
		
<td align="" class="responsive" valign="top" width="30%">
<div class="blog-side"><!-- m -->

<div class="side-con">
<div class="side-con-title">
Resources
</div>

<ul class="side-con ul">
<li class=""><a href="/company/about"><div class="side-con-li">About<i style="float: right;" class="fa fa-caret-right"></i></div></a></li>

<li class=""><a href="/jobs/"><div class="side-con-li">Jobs<i style="float: right;" class="fa fa-caret-right"></i></div></a></li>

<li class=""><a href="/library/"><div class="side-con-li">Library<i style="float: right;" class="fa fa-caret-right"></i></div></a></li>

<li class=""><a href="/docs/faq"><div class="side-con-li">FAQ<i style="float: right;" class="fa fa-caret-right"></i></div></a></li>

<li class=""><a href="/docs/survey"><div class="side-con-li">Quick Survey<i style="float: right;" class="fa fa-caret-right"></i></div></a></li>
</ul>
</div>
<br>

<div class="side-con">
<div class="side-con-title">
NG callers
</div>

<div class="side-con-text">
+ (234) 9071 682 556
</div>

<div class="side-con-title">
US callers
</div>


<div class="side-con-text">
+1 (512) 957-7750

</div>

<div class="side-con-text context">
RS - Developers is a company that renders Web and App development services worldwide. initially, RSD was launched in 2017 by a few full stack developers with the aim of rendering these services globally. 
</div>

<div class="side-con-text context">
RSD is currently managing over 500+ websites with a star strength of over 100+ developers.
</div>



</div>
</br>


</div><!-- m -->
</td>		
</tr>
</table>
		
		
		
		<br>
		<br>
		
		</div>
		<?
		//ends
		
		
		include '../footer.php';
		}
		
	} else {
		header("Location: /");
		exit();
	}
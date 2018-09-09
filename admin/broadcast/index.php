<?php
//broadcast
	$link = 'broadcast';
	include '../../security/admin_check.php';
	include '../../database/database.php';
	include '../../header.php';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php';
	?>
	
	<div class="page_wrapper_sub">
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="#"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="yellow-plastic">
	<i class="fa fa-user-o"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Total Users
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from users";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_num_rows($ru);
	
	echo $cn ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="pink-plastic">
	<i class="fa fa-code"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Job Applicants
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from job_applicant";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_num_rows($ru);
	
	echo $cn ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="blue-plastic">
	<i class="fa fa-code"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Job Applicants
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from job_applicant";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_num_rows($ru);
	
	echo $cn ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	</tr>
	</table>
	<br>
	<!-- 2 -->
	
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="50%" valign="top" class="responsive">
	<form id="single" action="send.inc.php" method="POST">
			<input name="username" type="text" placeholder="Username" required="required" />

			<input name="type" type="hidden" value="single"/>

			<input name="title" type="text" placeholder="Title of your message" required="required"/>
			
			<textarea name="msg" rows="10" placeholder="Message Content" required="required"></textarea>
			
			<input type="submit" value="Send" name="submit" />

	</form>

	</td>
	
	<td width="50%" valign="top" class="responsive">
	<form id="bulk" action="send.inc.php" method="POST">

			<input name="type" type="hidden" value="bulk"/>

			<input name="title" type="text" placeholder="Title of your message" required="required"/>
			
			<textarea name="msg" rows="10" placeholder="Message Content" required="required"></textarea>
			
			<input type="submit" value="Send" name="submit" />


</form>
	
	</td>
	</tr>
	</table>
	
	
	</div>
	
<?
	include '../../footer.php';

	
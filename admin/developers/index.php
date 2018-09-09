<?
//developers backend
	$link = 'developers';
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
	Developers
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from developers";
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
	<td align="center" valign="top" width="50%" class="responsive">
	<form action="entry.inc" method="POST">
	<input name="username" type="text" required="" placeholder="username" />
	<input name="firstname" type="text" required="" placeholder="firstname" />
	<input name="lastname" type="text" required="" placeholder="lastname" /> 
	<input name="email" type="email" required="" placeholder="email" />
	<input name="password" type="text" required="" placeholder="password" />
	<input name="pin" type="text" required="" placeholder="pin" />
	
	</td>
	
	<td align="center" valign="top" width="50%" class="responsive">
	<input name="dob" type="date" required="" placeholder="dob" />
	<input name="skills" type="text" required="" placeholder="skills" />
	<select name="department" required="">
	<option value="">Select an option</option>
	<option value="App Development">App Development</option>
	<option value="Web Development">Web Development</option>
	</select>
	<input name="country" type="text" required="" placeholder="country" />
	<input name="account_status" type="number" required="" placeholder="account status" />
	
	<input type="submit" name="submit_dev" value="Submit" />
	<input type="reset" name="reset" value="Reset" />
	</form>
	</td>
	</tr>
	</table>
	
	</div>
<?
include '../../footer.php';

<?php
//Jobs
session_start();
$me = $_SESSION['username'];
$link = 'jobs' ;

include '../database/database.php' ;
include '../header_plain.php' ;
include '../assets/parallax_black.php' ;
include '../nav/team_nav.php' ;

?>

<div class="page_wrapper_sub">

<!-- faq starts -->

<table width="100%" cellpadding="10">
<tr bgcolor="">
<td valign="top" class="responsive" width="50%">	

<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">
<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Who are the RS - Developers?
</div>

<div class="faq_answer">
we are a group of full-stack developers that work together to meet the needs of our customers and clients. we develope & design full websites, mobile applications, wordpress blogs and lot more. suffix is to say "codding is what we do" .
</div>
</td>
</tr>
</table>

<!-- next -->

<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Required programming languages
</div>

<div class="faq_answer">
Officially, we do not have a list of languages which you must know in order to work with us here at RS - Developers. but, for us to be certain of the fact that you can work with us if you are given the opportunity, you are to know a minimum of 4 programming languages.
</div>

</td>


</tr>
</table>



<table class="" cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>

<td valign="top" width="90%">
<div class="faq_question">
When are your working days?
</div>

<div class="faq_answer">
We work Monday - Friday from 6am  - 10pm daily 
</div>

</td>
</tr>
</table>



</td>

<!-- right side starts -->

<td valign="top" class="responsive" width="50%">

<!-- next -->

<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Years of working experiences
</div>

<div class="faq_answer">
We do not have a fixed number of years with working experiences, but 3 to 4 years of working experiences will be appreciated
</div>

</td>


</tr>
</table>



<table class="" cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
How much am i going to be paid?
</div>

<div class="faq_answer">
Over here at RS - Developers, we pay developers according to the work they do. <span class="email">50%</span> of the total job charge is what a developer gets from every job well done.
</div>

</td>
</tr>
</table>


<table class="" cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
!
</div>
</td>

<td valign="top" width="90%">
<div class="faq_question">
Allocated time for Jobs
</div>

<div class="faq_answer">
All <b>web development</b> services should be brought to completion within 14 working days, except for special projects that
require a lot of time for completion
</div>

</td>
</tr>
</table>



</td>
</tr>
</table>

<br></br>	
<!-- wrapper ends -->

<?php
	//check pending
	
	$chk = "select * from job_applicant where username='$me' ";
	$run_chk = mysqli_query($connect, $chk);
	$countit = mysqli_num_rows($run_chk);
	
?>

<?php 
	if(isset($_SESSION['username']) && $countit < 1 ) {
	
	//get details
	
	$sel = "select * from users where username='$me' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$inf = mysqli_fetch_assoc($sel_cmd);
	
?>
	<!-- form starts -->
	
	<table cellpadding="5" width="100%">
	<tr bgcolor="">
	<td class="invisible" width="20%">
	</td>
	
	<td class="responsive" width="60%">
	<!-- forms here-->
	<center>
	
	<form action="apply.inc.php" enctype="multipart/form-data" method="POST">	
	<input type="text" name="username" readonly="readonly" placeholder="<? echo $me ?>">
	<input type="text" name="username" readonly="readonly" placeholder="<? echo $inf['firstname']?>">
	<input type="text" name="username" readonly="readonly" placeholder="<? echo $inf['lastname']?>">
	<input type="text" name="country" readonly="readonly" placeholder="<? echo $inf['country']?>">
	
	
	<div class="valid_class" style="width: 91%; margin-top: 10px;">
	Select your coding skills
	</div>
	
	<select name="skills[]" size="6" multiple="multiple" required="required">
	<option value="PHP">PHP</option>
	<option value="SQL">SQL</option>
	<option value="CSS">CSS</option>
	<option value="JQuery">JQuery</option>
	<option value="Javascript">Javascript</option>
	<option value="JSON">JSON</option>
	<option value="HTML">HTML</option>
	<option value="ASP.NET">ASP.NET</option>
	<option value="MySQL">MySQL</option>
	</select>
		
	
	<div class="forbidden_class" style="width: 90.0%;">
	<i class="fa fa-warning"></i>
	Be reminded that your choices here will affect your interview questions. do not select languages you ain't fluent with.
	</div>
	
	<br></br>
	
	<div class="valid_class" style="width: 91%; margin-top: 12px;">
	How many years have you worked with these languages?
	</div>
	
	<select name="working-years" required="required">
	<option value="">Select an option</option>
	<option value="More than 10years">More than 10years</option>
	<option value="More than 5years">More than 5years</option>
	<option value="More than 3years">More than 3years</option>
	</select>
	
	<div class="valid_class" style="width: 91%; margin-top: 12px;">
	What can you do if you are employed?
	</div>
	
	<select name="department" required="required">
	<option value="">Select an option</option>
	<option value="App Development">App Development</option>
	<option value="Web Development">Web Development</option>
	</select>
	
	<div class="valid_class" style="width: 91%; margin-top: 10px;">
	Select a clear potrait image
	</div>
	
	<input type="file" required="required" name="potrait" />
	
	<br></br>
	
	<input type="submit" name="submit" value="Apply" />
	<input type="reset" name="submit" value="Reset" />
	
	</form>
	</center>
	</td>
	
	<td class="invisible" width="20%">
	</td>
	
	</tr>
	</table>
	
<?
	}

?>

</div>
<?
include '../footer.php' ;

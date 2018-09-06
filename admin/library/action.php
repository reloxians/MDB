<?php
	/** Admin Search**/
	$link = 'function';
	if(isset($_POST['ids'])) {
	include '../../security/admin_check.php' ;
	include '../../database/database.php';
	include '../../header.php';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php' ;
	
	$ids = $_POST['ids'];
	
	$sel = "select * from books where id = '$ids' ";
	$cmd = mysqli_query($connect, $sel);
	$res = mysqli_fetch_assoc($cmd);
	
	?>
	
	<div class="page_wrapper_sub">
	
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<form action="action.inc.php" method="POST">
	<td valign="top" class="responsive" width="50">
	<input type="hidden" name="ids" value="<? echo $res['id'] ?>" />
	
	<input type="text" name="title_key" value="<? echo $res['title_key'] ?>" placeholder="Title: <? echo $res['title_key'] ?>" required="required" />

<input type="text" name="cover_name" value="<? echo $res['cover_name'] ?>" placeholder="Cover Name: <? echo $res['cover_name'] ?>" required="required" />

<input type="text" name="file_name" value="<? echo $res['file_name'] ?>" placeholder="File Name: <? echo $res['file_name'] ?>" required="required" />


<!--
<input type="text" name="category" value="<? echo $res['category'] ?>" placeholder="Category: <? echo $res['category'] ?>" required="required" />
-->

<select name="category" required />
	<option value="<? echo $res['category'] ?>"><? echo $res['category'] ?></option>
	<option value="HTML">HTML</option>
	<option value="CSS">CSS</option>
	<option value="AJax">AJax</option>
	<option value="JavaScript">JavaScript</option>
	<option value="JQuery">JQuery</option>
	<option value="BootStrap">BootStrap</option>
	<option value="PHP">PHP</option>
	<option value="SQL">SQL</option>
	<option value="ASP.NET">ASP.NET</option>
</select>
	

<input type="text" name="price" value="<? echo $res['price'] ?>" placeholder="Price: <? echo '₦'.number_format($res['price']) ?>" required="required" />

	</td>
	
	
	<td valign="top" class="responsive" width="50">

<textarea name="description" rows="10" placeholder="" required="required"><? echo $res['description'] ?></textarea>

<input type="submit" name="update" value="update" />
<input type="reset" name="reset" value="Reset" />
<input type="submit" name="delete" value="delete" />
	
	</td>
	</form>
	</tr>
	</table>
	</div>
	<?
	include '../../footer.php';
} else {
	header("Location: /");
}
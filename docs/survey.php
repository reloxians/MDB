<?php
	session_start();
	include '../header.php' ;
	include '../parallax.php' ;
	include '../security/auth_check.php' ;
	
	$me = $_SESSION['username'];
	
	if(isset($_SESSION['username'])) {
		include '../database/database.php' ;
		include '../nav/profile_nav.php' ;	
		
	}

	?>
	<div class="page_wrapper_sub">
	
	
<div style="background: transparent" class="pre_block">
<div class="pre_block_header_pink">
Quick Survey Form
</div>
<br>
Having any challenges with the usage of our website and it's services? help us serve you better by taking part in our quick survey exercise.  
</div>	

			
		<center>
		<div class="form_class"><!-- forms -->
			
		<form action="survey.inc.php" method="POST">
		<input name="username" type="text" placeholder="<? echo $me ?> " readonly="readonly" />
			
		<div class="forbidden_class_wrapper">
		<div class="valid_class">How did you come across this website? </div> 
		</div>
		
		<select name="source-answer" required="required">
		<option value="">Select an option</option>
		<option value="Throung a friend">Through a friend</option>
		<option value="Via an advert">Via an advert</option>
		<option value="Stumbled upon it">Stumbled upon it</option>
		</select>
			
		<div class="forbidden_class_wrapper">
		<div class="valid_class">How long have you been using this website? </div> 
		</div>

		<select name="time-answer" required="required">
		<option value="">Select an option</option>
		<option value="For a few weeks now">For a few weeks now</option>
		<option value="For a few months now">For a few months now</option>
		<option value="For some years now">For some years now</option>
		</select>
		
		<div class="forbidden_class_wrapper">
		<div class="valid_class">Do you like the quality of services we render here in this website? </div> 
		</div>
		
		<select name="service-answer" required="required">
		<option value="">Select an option</option>
		<option value="Yes">Yes</option>
		<option value="To an extent">To an extent</option>
		<option value="Not really">Not really</option>
		<option value="No">No</option>
		</select>

		<div class="forbidden_class_wrapper">
		<div class="valid_class">How would you rate our services here on this website? </div> 
		</div>
		
		<select name="rate-answer" required="required">
		<option value="">Select an option</option>
		<option value="100">100</option>
		<option value="90">90</option>
		<option value="80">80</option>
		<option value="70">70</option>
		<option value="60">60</option>
		<option value="50">50</option>
		<option value="40">40</option>
		<option value="30">30</option>
		<option value="20">20</option>
		<option value="10">10</option>
		</select>

		
		<div class="forbidden_class_wrapper">
		<div class="valid_class">Would you recommend this website to friends and family if the need be? </div> 
		</div>

		<select name="recommend-answer" required="required">
		<option value="">Select an option</option>
		<option value="Yes">Yes</option>
		<option value="Maybe">Maybe</option>
		<option value="No">No</option>
		</select>
		
		<div class="forbidden_class_wrapper">
		<div class="valid_class">Is there a way we can improve our services? if yes, drop a comment below! </div> 
		</div>
		
		<textarea rows="5" name="improve-answer" placeholder="Tell us how we can improve our services"></textarea>


						
			<input type="submit" value="Submit" name="submit" />
			</form>
		
			</div>			
			</center>
			
			<center>
			
			<div class="agreement">
			By clicking "Submit", you acknowledge that you have read our updated <a class="email" href="tos.php"> terms of service</a>, <a class="email" href="disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
			
			
			
			
			</div>
			
			</center>
			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			
			
			
</div>		
		
	
	</div><!-- wrapper ends -->
	
	<?
	include '../footer.php' ;
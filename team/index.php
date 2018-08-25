<?php
//Team
session_start();
$me = $_SESSION['username'];
$link = 'team' ;

include '../database/database.php' ;
include '../header_plain.php' ;
include '../assets/parallax_black_team.php' ;
include '../nav/team_nav.php' ;

?>

<div class="page_wrapper_sub">

<!-- stop big font -->
<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="5%"></td>
<!-- padding starts -->

<td valign="top" width="75%">
<!-- details starts -->
<span class="email">Reloxians Alvin Iruoghene - CEO</span><!-- name -->
<div class="dev_details">
Reloxians Alvin Iruoghene is a full stack developer from Nigeria. he is the main brain behind this company (RS - Developers). RS - Developers was raised single-handedly by Alvin in 2017. Alvin is currently studying computer science at the Federal University of PortHarcourt, Nigeria. <a href="https://facebook.com/reloxian" target="blank">Learn More</a>

</div>
</td>
<td align="right" valign="top" width="15%">
<!-- imgs -->

<img src="/media/images/devs/alvin_007.jpeg" class="disabled" width="80%" />

</td>


<!-- padding ends-->
<td class="invisible" width="5%"></td>
</tr>

</table>




<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="5%"></td>
<!-- padding starts -->

<td valign="top" width="75%">
<!-- details starts -->
<span class="email">Jennifer Montrose - Deputy Chief of Staff</span><!-- name -->
<div class="dev_details">

Jennifer Montrose is RS - Developer's expert in Getting Things Done. She's been managing our executive team since 2017, ensuring that they're focused, efficient, and serving our employees well. With two fairly useless (but fascinating!) degrees in art history and film studies, Jennifer had been an executive assistant for her entire career before she became Deputy Chief of Staff. She joined the tech industry by happenstance when she applied to RS - Developers because it was listed 15th in Crain's "Best Place to Work in NYC". She spends her extra time advocating for RS - Developers to become the most inclusive place for developers to ethically shape the future. She's an amateur cook, avid documentary viewer, and a lively conversationalist. She plans to spend the rest of her life in Brooklyn.


</div>
</td>
<td align="right" valign="" width="15%">
<!-- imgs -->

<img src="/media/images/devs/william-stitt.jpeg" class="disabled" width="80%" />

</td>


<!-- padding ends-->
<td class="invisible" width="5%"></td>
</tr>
</table>



<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="5%"></td>
<!-- padding starts -->

<td valign="top" width="75%">
<!-- details starts -->
<span class="email">Wareen wong - VP of Finance</span><!-- name -->
<div class="dev_details">
Wareen wong is ultimately responsible for the financial health of the company; he oversees the accounting, finance, and facilities teams. He joined RS - Developers in 2017 as the Controller charged with systems implementation and process improvements. Jerry has over 18 years of strategic finance and operational leadership experience working in the ad tech, software, and media industries. He holds an accounting degree from St. John's University and is also a Certified Public Accountant. In his spare time, Jerry serves as the board president of Diaspora Community Services, a social support service agency that empowers families and individuals to maximize their abilities to succeed.


</div>
</td>
<td align="right" valign="top" width="15%">
<!-- imgs -->

<img src="/media/images/devs/warren-wong.jpeg" class="disabled" width="80%" />

</td>


<!-- padding ends-->
<td class="invisible" width="5%"></td>
</tr>
</table>
<!-- stop big font -->



</div>
<?
include '../footer.php' ;

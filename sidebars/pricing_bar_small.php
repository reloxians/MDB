<div class="sidebar_wrapper_small">

<ul class="sidebar_links_small">
	
	<li class="<? if($active == 'services') { echo 'sidebar_links_active'; } ?>"><a href="/pricing/">Pricing Overview</a></li>
	
	<!--
	
	<li class="<? if($active == 'websites') { echo 'sidebar_links_active'; } ?>"><a href="#">Websites <i class="fa fa-angle-double-down"></i></a>
	</li>
	
	-->
	
<!--	<ul class="sidebar_links_child_small"> -->

		<li class="<? if($child == 'e-commerce') { echo 'sidebar_links_active_child'; } ?>"><a href="/pricing/websites/e-commerce.php">E-commerce Websites</a></li>
	
	<li class="<? if($child == 'school') { echo 'sidebar_links_active_child'; } ?>"><a href="/pricing/websites/corporate.php">Corporate Websites</a></li>
	
	<li class="<? if($child == 'church') { echo 'sidebar_links_active_child'; } ?>"><a href="/pricing/websites/church.php">Church Websites</a></li>
	
	<li class="<? if($child == 'personal') { echo 'sidebar_links_active_child'; } ?>"><a href="/pricing/websites/business.php">Business Websites</a></li>
	
	<li class="<? if($child == 'qanda') { echo 'sidebar_links_active_child'; } ?>"><a href="/pricing/websites/qanda.php">Q&A Websites</a></li>
	
<!--	</ul> -->	


<!--	
	<li class="<? if($active == 'android') { echo 'sidebar_links_active'; } ?>"><a href="#">Android App Dev  <i class="fa fa-angle-double-down"></i></a>
	
	-->
	
<!--	<ul class="sidebar_links_child_small">		-->

	<li class="<? if($child == 'webapps') { echo 'sidebar_links_active_child'; } ?>"><a href="#">Websites Apps</a></li>
	
	<li class="<? if($child == 'otherapps') { echo 'sidebar_links_active_child'; } ?>"><a href="#">Other Apps</a></li>
	
<!--	</ul>	-->
	
	
<!--	</li>	-->
	
	<li class="<? if($active == 'web-training') { echo 'sidebar_links_active'; } ?>"><a href="#">Web Dev. Training</a></li>
	
	<li class="<? if($active == 'app-training') { echo 'sidebar_links_active'; } ?>"><a href="#">Android App Dev. Training</a></li>

</ul>

</div>



<script>

$(document).ready(function(){

  $(".sidebar_links_small liu").hover(function(){

    $(".sidebar_links_child_smallu", this).slideDown(100);

  }, function(){

    $(".sidebar_links_child_smallu", this).stop().slideUp(100);

  });

})

</script>
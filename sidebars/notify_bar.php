

<div class="sidebar_wrapper">
<div class="sidebar_content">

<ul class="sidebar_links">
	
	<li class="<? if($active == 'notify') { echo 'sidebar_links_active'; } ?>"><a href="/notify/">Notify Overview</a></li>
	
	<li class="<? if($active == 'unread') { echo 'sidebar_links_active'; } ?>"><a href="#">Unread <i class="fa fa-angle-double-down"></i></a>
	
	<ul class="sidebar_links_child">
	<li class="<? if($child == 'unread_msg') { echo 'sidebar_links_active_child'; } ?>"><a href="unread.php">Unread Msg</a></li>
	
	</ul>
	
	
	</li>
	
	<li class="<? if($active == 'read') { echo 'sidebar_links_active'; } ?>"><a href="#">Read  <i class="fa fa-angle-double-down"></i></a>
	
	<ul class="sidebar_links_child">
	<li class="<? if($child == 'read_msg') { echo 'sidebar_links_active_child'; } ?>"><a href="read.php">Read Msg</a></li>
	
	</ul>	
	</li>

</ul>

</div>
</div>
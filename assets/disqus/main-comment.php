<?php
$selu = "select * from comments order by id desc";
$cmdu = mysqli_query($connect, $selu);
$count = mysqli_num_rows($cmdu);
$pid = $rws['id'];
?>


<?
$me = $_SESSION['username'];
$usr = "select * from users where username = '$me' ";
$cmdu = mysqli_query($connect, $usr);
$inf = mysqli_fetch_assoc($cmdu);

?>

<table width="100%" cellpadding="0"><!-- upper most -->
<tr bgcolor="" class="line-cont">
<td width="30%" class="line-cont">
<span class="total-comment-count"><!-- total comment count -->
<? echo $count ?> Comments
</span><!-- total comment count ends -->
</td>

<td width="50%" class="line-cont"><!-- site name -->
<div class="site-name"><!-- site name -->
<a href="">
RS - Developers
</a>
</div><!-- site name ends -->
</td>

<td align="right" width="20%" class="line-cont"><!-- login link -->
<span class="site-name">
<a href="#"><i class="fa fa-comments"></i> Login <i class="fa fa-caret-down caret"></i></a>
</span>
</td>

</tr>
</table><!-- upper most ends -->

<table width="100%" cellpadding=""><!-- sec 2 -->
<tr bgcolor="">
<td width="30%"><!-- recommend -->
<div class="recommend-wrapper">
<i class="fa fa-heart-o heart"></i> <span class="recommend">Recommend</span> <span class="recommend-count">644</span>
</div>
</td>

<td align="left" width="50%"><!-- share -->
<span class="site-name small"><a href="#"><i class="fa fa-share"></i> Share</a></span>
</td><!-- share end -->

<td align="right" width="20%"><!-- sort -->
<span class="site-name small"><a href="#">Sort by Best <i class="fa fa-caret-down caret"></i></a></span>
</td><!-- sort ends -->
</tr>
</table><!-- sec 2 ends -->

<form action="/assets/disqus/disqus.inc" method="POST">
<table width="100%" cellpadding=""><!-- com 101 -->
<tr bgcolor="">
<td width="10%"><!-- avatar -->
<img src="/assets/disqus/asserts/avatar.png" class="round" width="88%" />
</td><!-- avatar ends -->

<td width="85%">
<input type="disqus" required="required" name="data-content" placeholder="Join the discussion...." class="comment-full" />
</td>

</tr>
</table><!--com 101 ends -->

<table width="100%"><!-- feilds -->
<tr bgcolor="">
<td width="10%"></td>

<td align="" valign="top" width="30%"><!-- social -->
<span class="site-name smaller">LOGIN WITH </span>

<a href="#"><div class="social-space"> </div></a>

<div class="social-svgs">
<ul class="social-svgs-ul">
<li><a href="#"><img src="../assets/disqus/asserts/facebook.svg" width="20%" /></a></li>
<li><a href="#"><img src="../assets/disqus/asserts/pinterest.svg" width="20%" /></a></li>
<li><a href="#"><img src="../assets/disqus/asserts/twitter.svg" width="20%" /></a></li>
<li><a href="#"><img src="../assets/disqus/asserts/google-plus.svg" width="20%" /></a></li>
</ul>
</div>

</td><!-- social ends-->


<td valign="top" width="60%"><!-- input -->
<span class="site-name smaller">OR COMMENT ANONYMOUSLY <i class="fa fa-question-circle-o quest"></i></span>

<input type="hidden" name="post_id" value="<? echo $rws['id'] ?>" /> 

<input type="disqus" class="spaced" name="firstname" required="required" placeholder="Firstname" value="<? echo $inf['firstname'] ?>" />

<input type="disqus" class="spaced" name="lastname" required="required" placeholder="Lastname" value="<? echo $inf['lastname'] ?>" />

<input type="email" class="disqus" name="email" required="requured" placeholder="Email Address" value="<? echo $inf['email'] ?>" />

<div class="chk_wrapper">
<input id="checkbox" type="checkbox" required="required" /> <span class="disqus-agree">I agree to Disqus'</span><span class="disqus-agree-link"><a href="#"> Terms of Service</a></span>
</div>


<div class="chk_wrapper">
<input id="checkbox" type="checkbox" required="required" /> <span class="disqus-agree">I agree to Disqus' processing of email and IP address, and the use of cookies, to facilitate my authentication and posting of comments, explained further in the</span> <span class="disqus-agree-link"><a href="#"> Privacy Policy</a></span>
</div>

</td>
</tr>
</table><!--fields -->
<br>
<br>

<table width="100%"><!-- action -->
<tr bgcolor="">
<td width="90%"></td>

<td width="10%"><button class="disqus-submit" name="submit" type="submit"><i class="fa fa-arrow-right"></i></button></td>
</form>

</tr>
</table><!-- action ends -->

<?
$sel = "select * from comments where post_id = '$pid' order by id desc";
$cmd = mysqli_query($connect, $sel);

 while($res = mysqli_fetch_assoc($cmd)) {
?>

<!-- listing starts -->
<table width="100%">
<tr bgcolor="">
<td valign="top" width="10%"><!-- avatar -->
<img src="/assets/disqus/asserts/avatar.png" class="round" width="88%" />
</td><!-- avatar ends -->

<td valign="top" width="90%">

<span class="commentor"><!-- names -->
<? echo '<a href="">' .$res['firstname']. ' ' .$res['lastname']. '</a>' ?></span>

<span class="disqus-dot"><i class="fa fa-circle"></i></span>

<span class="disqus-time">
<? echo now($res['created'])?>
</span><!-- name ends -->

<!-- content -->

<div class="disqus-content">
<? echo base64_decode($res['content']) ?>
</div>
</td>
</tr>
</table>

<!-- activity -->
<table width="100%">
<tr bgcolor="">

<td width="10%"></td>

<td width="90%">
<span class="like-count">
<? echo $res['likes'] ?>
</span>

<a href="#" class="like-btn"><i class="fa fa-chevron-up"></i></a> <span class="demacator"> | </span><a href="#" class="like-btn"><i class="fa fa-chevron-down"></i></a>

<span class="disqus-dot"><i class="fa fa-circle"></i></span>

<?php if(isset($_SESSION['username'])) { 
?>
<a href="javascript:void()" id="reply-btn<? echo $res['id'] ?>" class="site-name small"> Reply</a>
<?
} else {

?>

<a href="javascript:void()" id="reply-btn-invalid<? echo $res['id'] ?>" class="site-name small"> Reply</a>

<?

}
?>

<span class="disqus-dot"><i class="fa fa-circle"></i></span>
<a href="#" class="site-name small"> Share</a>


<!-- reply invalid -->
<div id="reply-form-invalid<? echo $res['id'] ?>" class="infomat-error blog">
You cannot reply to this comment as an anonymous user, sign in to remove restrictions
</div>
<!-- reply invalid -->


<div id="reply-form<? echo $res['id'] ?>" class="reply-form"><!-- reply form -->

<form action="/assets/disqus/reply.inc" method="POST">

<input type="hidden" value="<? echo $res['id'] ?>" name="comment_id" />

<input type="disqus" required="required" name="data-content" placeholder="Join the discussion...." class="comment-full" />

<input type="disqus" class="spaced" name="firstname" required="required" placeholder="Firstname" value="<? echo $inf['firstname'] ?>" />

<input type="disqus" class="spaced" name="lastname" required="required" placeholder="Lastname" value="<? echo $inf['lastname'] ?>" />

<input type="email" class="disqus" name="email" required="requured" placeholder="Email Address" value="<? echo $inf['email'] ?>"/>

<button class="disqus-submit" name="submit" type="submit"><i class="fa fa-arrow-right"></i></button>

</form>
</div><!-- reply form -->

<!--

<script>
function id<? echo $res['id'] ?>() {
    var x = document.getElementById("<? echo $res['id'] ?>");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

-->


<script>
$(document).ready(function(){
    $("#reply-btn-invalid<? echo $res['id'] ?>").click(function(){
        $("#reply-form-invalid<? echo $res['id'] ?>").toggle();
    });
});
</script>


<script>
$(document).ready(function(){
    $("#reply-btn<? echo $res['id'] ?>").click(function(){
        $("#reply-form<? echo $res['id'] ?>").toggle();
    });
});
</script>

</td>

</tr>
</table>
<br>

<?
$cid = $res['id'];

$sell = "select * from replies where comment_id = '$cid' ";
$cmd0 = mysqli_query($connect, $sell);

 while($ress = mysqli_fetch_assoc($cmd0)) {
?>

<!-- list replies -->

<table width="100%">
<tr bgcolor="">
<td width="10%"></td>

<td valign="top" width="10%"><!-- avatar -->
<img src="/assets/disqus/asserts/avatar.png" class="round" width="88%" />
</td><!-- avatar ends -->

<td valign="top" width="80%">

<span class="commentor"><!-- names -->
<? echo '<a href="">' .$ress['firstname']. ' ' .$ress['lastname']. '</a>' ?></span> <span class="reply_ic"><i class="fa fa-reply fa-flip-horizontal"></i> <? echo '<a href="">' .$res['firstname']. ' ' .$res['lastname']. '</a>' ?></span>

<span class="disqus-dot"><i class="fa fa-circle"></i></span>

<span class="disqus-time">
<? echo now($ress['created'])?>
</span><!-- name ends -->

<!-- content -->

<div class="disqus-content">
<? echo base64_decode($ress['content']) ?>
</div>

</td>

</tr>
</table>
<br>
<!-- list replies -->

<?

}

?>



<?

}

?>






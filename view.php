<?php
require_once 'connect.php';
require_once 'header.php';

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: $url_path");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: $url_path");
}

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$description = $row['description'];
$author = $row['posted_by'];
$time = $row['date'];
?>
<section class="sec002">
	<div class="sec2-container flex-center-top">
		<div class="post-container">
            <div class="post-data">
            <div class="post-cover"></div>
            <div class="post-title">
                <blockquote>
					<h1><?php echo $title ?></h1>
				</blockquote>
                <span><?php echo $author . ' ------ ' . $time ?></span>
            </div>
			</div>
            <div contenteditable="false" class="post-content">
                <div class="redactor-box">
                <div class="redactor-styles">
                <?php echo $description ?>
            </div>
            </div>
            </div>
        </div>

		<!-- starting widgets container -->

		<div class="widget-container">

			<!-- social media widget start-->
			<div class="social-container widget">
				<div class="widget-title">
					<h1>Social Links</h1>
				</div>
				<div class="content">
					<img src="./img/social/fb.PNG">
					<img src="./img/social/li.PNG">
					<img src="./img/social/twiter.PNG">
					<img src="./img/social/youtube.PNG">
					<img src="./img/social/instagram.PNG">
				</div>
			</div>

			<!-- tags widget start-->
			<div class="tags-container widget">
				<div class="widget-title">
					<h1><nkiko>#</nkiko> tags</h1>
				</div>
				<div class="content">
					<p>#home</p>
					<p>#pro</p>
					<p>#html</p>
					<p>#python</p>
					<p>#programmer</p>
				</div>
			</div>

			<!-- advertisement widget start-->
			<div class="ads-container widget">
				<div class="widget-title">
					<h1><nkiko>#</nkiko> tags</h1>
				</div>
				<div class="content">
					<a href="#">
						<span></span>
					</a>
				</div>
			</div>
</section>


<?php
if (isset($_SESSION['username'])) {
    ?>
    <div class="w3-text-green"><a href="<?=$url_path?>edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="<?=$url_path?>del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
    <?php
}
echo '</div></div>';


include("footer.php");

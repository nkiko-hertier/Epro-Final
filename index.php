<?php
require_once 'connect.php';
require_once 'header.php';
?>
<section class="sec001">
	<div class="sec1-container flex-center">
		<form action="search.php" method="GET" class="flex-center">
			<input type="text" class="search" name="q" id="search" placeholder="search by keyword....">
		    	<a type="submit" class="twiter-background" name="searcher">Search</a>
	    </form>
	</div>
</section>
<section class="sec002">
	<div class="sec2-container flex-center-top">
		<div class="post-container">

<!-- sample post start-->
<div class="post">
    <div class="post-cover">
        
    </div>
    <div class="post-content">
        <h1>Blog post title</h1>
        <p>leoms epison space for post description</p>
    </div>
    <div class="post-btn-container flex-end">
        <a class="twiter-btn" href="$row['post_link']">Read More</a>
    </div>
</div>
<div class="other-posts" id="post">
<?php
// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = PAGINATION;
$totalpages = ceil($numrows / $rowsperpage);

$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}

if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">No post yet!</div>';
} else {
  while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    $des = htmlentities(strip_tags($row['description']));
    $slug = htmlentities($row['slug']);
    $time = htmlentities($row['date']);

    $permalink = "p/".$id ."/".$slug;
     
    echo '
    <div class="post">
        <div class="cover-text">
        <div class="post-cover">
            
        </div>
        <div class="post-content">';
    echo "<h1><a href='$permalink'>$title</a></h1><p>";
    ?>
    <p><?php echo substr($des, 0, 100); ?></p>
</div></div>
<?php
    echo "
    <div class='post-btn-container flex-end'>
        <a class='twiter-btn' href='$permalink'>Read More</a>
    </div></div>";
}
echo '</div> </div>';
}
echo '
<div class="widget-container">

    <!-- social media widget start-->
    <div class="social-container widget">
        <div class="widget-title">
            <h1>Social Links</h1>
        </div>
        <div class="content">
            <img src="./images/facebook.png">
            <img src="./images/instagram.png">
            <img src="./images/linkedin.png">
            <img src="./images/twitter.png">
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
    </div> </div>
</section>';
echo '</div></div>';
include("footer.php");

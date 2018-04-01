<?php require_once "header.php";
require_once "admin/class/news.class.php";
$news = new News();
$news->category_id = $_GET['id'];
$newslist = $news->getAllCategoryNews();
// print_r($newslist);
?>

<div>
	<?php foreach ($newslist as $nl) { ?>
	
            <h2><a href="news.php?id=<?php echo $nl['id'] ?>"><?php echo $nl['title'] ?>&raquo;</a></h2>          
            <img src="admin/img/<?php echo $nl['feature_image']?>" alt="" width="100px" height="70px" />
            <p><strong><a href="news.php?id=<?php $nl['id'] ?> "><?php echo $nl['title']?></a></strong></p>
            <p><?php echo $nl['short_description']?></p>
            <br class="clear">           
    <?php } ?>
</div>
  

<?php require_once "footer.php"; ?>
<?php 

require_once "admin/class/news.class.php";
$news = new News();
$slider = $news->getNewsSlider();
//print_r($slider);

$latest = $news->getLatestNews();

$title = "Home Page";
require_once "header.php";


?>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="featured_slide">
        <ul id="featurednews">
          <?php foreach ($slider as $s) { 
            ?>
            <li><img src="admin/img/<?php echo $s['feature_image']; ?>" alt="" />
              <div class="panel-overlay">
                <h2><?php echo $s['title'] ; ?></h2>
                <p><?php echo $s['short_description']; ?><br />
                  <a href="<?php  ?> ">Continue Reading &raquo;</a></p>
                </div>
              </li>
              <?php } ?>    
            </ul>
          </div>
        </div>
        <div class="column">
          <ul class="latestnews">
            <?php foreach ($latest as $l){ ?>
            <li><img src="admin/img/<?php echo $l['feature_image'] ?>" alt="" width = "135px" height="98px" />
              <p><strong><a href="#"><?php echo $l['title'] ?></a></strong> <?php echo $l['short_description'] ?></p>
            </li>
            <?php } ?>   

          </ul>
        </div>
        <br class="clear" />
      </div>
    </div>
    <!-- ####################################################################################################### -->
    <div class="wrapper">
      <div id="adblock">
        <div class="fl_left"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
        <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
        <br class="clear" />
      </div>
      <div id="hpage_cats">
        <?php
        $i = 1;
        foreach ($activeCat as $ac) { 
          $news->category_id = $ac['id'];
          $bn = $news->getBreakingNews();
       //print_r($bn);
          if($i % 2==0){
            $c = 'fl_left';
          }else{
            $c = 'fl_right';
          }
          ?>

          
          <div class="<?php echo $c;?>">
            <?php if(count($bn) >=1){ ?><br class="clear">
            <h2><a href="#"><?php echo $ac['name'] ?>&raquo;</a></h2>          
            <img src="admin/img/<?php echo $bn[0]['feature_image']?>" alt="" width="100px" height="70px" />
            <p><strong><a href="#"><?php echo $bn[0]['title']?></a></strong></p>
            <p><?php echo $bn[0]['short_description']?></p>           
        <?php } ?>
          </div>
            <?php $i++; } ?>
          <br class="clear" />
        </div>
      </div>
      <!-- ####################################################################################################### -->
      <div class="wrapper">
        <div class="container">
          <div class="content">
            <div id="hpage_latest">
              <h2>Feugiatrutrum rhoncus semper</h2>
              <ul>
                <li><img src="images/demo/190x130.gif" alt="" />
                  <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
                  <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
                  <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </li>
                <li><img src="images/demo/190x130.gif" alt="" />
                  <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
                  <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
                  <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </li>
                <li class="last"><img src="images/demo/190x130.gif" alt="" />
                  <p>Nullamlacus dui ipsum conseqlo borttis non euisque morbipen a sdapibulum orna.</p>
                  <p>Urnau ltrices quis curabitur pha sellent esque congue magnisve stib ulum quismodo nulla et.</p>
                  <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </li>
              </ul>
              <br class="clear" />
            </div>
          </div>
          <div class="column">
            <div class="holder"><a href="#"><img src="images/demo/300x250.gif" alt="" /></a></div>
            <div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt="" /></a></div>
          </div>
          <br class="clear" />
        </div>
      </div>
      <!-- ####################################################################################################### -->
      <div class="wrapper">
        <div id="footer">
          <div class="footbox">
            <h2>Lacus interdum</h2>
            <ul>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li><a href="#">Praesent et eros</a></li>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li class="last"><a href="#">Praesent et eros</a></li>
            </ul>
          </div>
          <div class="footbox">
            <h2>Lacus interdum</h2>
            <ul>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li><a href="#">Praesent et eros</a></li>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li class="last"><a href="#">Praesent et eros</a></li>
            </ul>
          </div>
          <div class="footbox">
            <h2>Lacus interdum</h2>
            <ul>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li><a href="#">Praesent et eros</a></li>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li class="last"><a href="#">Praesent et eros</a></li>
            </ul>
          </div>
          <div class="footbox">
            <h2>Lacus interdum</h2>
            <ul>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li><a href="#">Praesent et eros</a></li>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li class="last"><a href="#">Praesent et eros</a></li>
            </ul>
          </div>
          <div class="footbox last">
            <h2>Lacus interdum</h2>
            <ul>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li><a href="#">Praesent et eros</a></li>
              <li><a href="#">Lorem ipsum dolor</a></li>
              <li><a href="#">Suspendisse in neque</a></li>
              <li class="last"><a href="#">Praesent et eros</a></li>
            </ul>
          </div>
          <br class="clear" />
        </div>
      </div>
      <!-- ####################################################################################################### -->
      <?php 
      require_once "footer.php";
      ?>
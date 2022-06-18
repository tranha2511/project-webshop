<div class="block-news-detail">
    <div class="news-img-detail">
        <img class="img-item" src="assets/img/uploads/news/<?php echo $new['avatar'] ?>"
    alt="<?php echo $new['title'] ?>" width="100%"/>
    </div>
    <div class="text-news">
        <h3 class="h3-title">
            <a href="<?php echo $new_link; ?>" class="a-title"><?php echo $new['title']; ?></a>
        </h3>
        <div class="time-post">
            <p class="news-main-p-s"><?php echo $new['content']; ?></p>
        </div>
    </div>
</div>
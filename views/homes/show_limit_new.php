<?php 
    require_once 'helpers/Helper.php';
?>
<div class="news-main">
        <div class="block-title">
            <h2 class="h2-title">TIN TỨC</h2>
        </div>
        <div class="block-news">
            <?php foreach ($news AS $new):
                $slugn = Helper::getSlug($new['title']);
                $new_link = "tin-tuc/$slugn/" . $new['id'] . ".html";
            ?>
                <div class="block-news-child">
                        <div class="news-img">
                        <img class="img-item" src="assets/img/uploads/news/<?php echo $new['avatar'] ?>"
                                        alt="<?php echo $new['title'] ?>" width="100%"/>
                        </div>
                        <div class="text-news">
                            <h3 class="h3-title">
                                <a href="<?php echo $new_link; ?>" class="a-title"><?php echo $new['title']; ?></a>
                            </h3>
                            <div class="time-post">
                                <p class="news-main-p"><?php echo $new['content']; ?></p>
                                    <div class="view-more-news">
                                        <a href="<?php echo $new_link; ?>" class="a-more-new">Xem thêm
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                                                <path d="M10.0586 1L14.9998 6.02351L10.0586 10.9647" stroke="#3F3FDB" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M7.17627 6.02344H14.9175" stroke="#3F3FDB" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M1 6.02344H3.88235" stroke="#3F3FDB" stroke-width="1.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </div>
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="view-more">
            <a href="tin-tuc.html">Xem thêm</a>
        </div>
    </div>
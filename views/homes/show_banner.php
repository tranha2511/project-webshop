<div class="flexslider">
	<ul class="slides">
		<?php foreach ($banners AS $banner): ?>	
			<li>
				<img name="slide" class="banner-product-img" src="assets/img/uploads/banners/<?php echo $banner['img'] ?>"/>
			</li>
		<?php endforeach; ?>
	</ul>
</div>



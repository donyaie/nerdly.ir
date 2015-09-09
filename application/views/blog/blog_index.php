<section class="row" id="blog-list">
        <?php if (isset($posts) && is_array($posts) && count($posts) > 0) { ?>
	                <?php foreach ($posts as $post) { ?>
		                <div class="row post" >
			                <a target="_blank" class="col-lg-6 col-md-6  col-sm-6 col-sm-12  post-image" href ="<?php echo base_url().'blog/article/'.$post->postGuid ?>">
				                <img class="img-responsive img-thumbnail" alt=" <?php echo $post->postTitle ?>" src="<?php echo $photoThemePath . $post->mediaTheme ?>" width="400px" height= "200px" /><!-- http://lorempixel.com/400/200/technics-->
			                </a>
			                <div class="col-lg-6 col-md-6  col-sm-6 col-sm-12 post-body" >

				                <a target="_blank"  href ="<?php echo base_url().'blog/article/'.$post->postGuid ?>"> <h2 class="img-tag-header post-header"><?php echo $post->postTitle ?></h2></a>
				                <p class="text-justify img-tag-body post-content">
					                <?php echo (empty($post->postExcerpt) ? '' : substr(trim(strip_tags($post->postExcerpt)), 0, 800) . '...') ?>
				                </p>
			                </div>


		                </div>
	                <?php
            }
        }
        else{
            
            echo "<p> موردی یافت نشد </p>";
        }
        ?>
    
    
    <nav>
            <?php if (isset($pagination)) { ?>
                <ul class='pagination'>
                    <?php echo $pagination ?>
                </ul>
            <?php } ?>
        </nav>
              
</section>
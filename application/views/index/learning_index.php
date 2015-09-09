
<ul class="row">
        <?php if (isset($posts) && is_array($posts) && count($posts) > 0) { ?>
            <?php foreach ($posts as $post) { ?>

                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

	                    <img class="img-responsive" alt=" <?php echo $post->postTitle ?>" src="<?php echo $photoThemePath . $post->mediaTheme ?>"  /><!-- http://lorempixel.com/400/200/technics-->
			                <a target="_blank" href ="<?php echo base_url().'blog/article/'.$post->postGuid ?> ">
                        <h2 class="img-tag-header"><?php echo $post->postTitle ?></h2>
                        <p class="text-justify img-tag-body">
                            <?php echo (empty($post->postExcerpt) ? '' : substr(trim(strip_tags($post->postExcerpt)), 0, 300) . '...') ?>
                        </p>
                    </a>
                </li>

                <?php
            }
        }
        ?>
</ul>           
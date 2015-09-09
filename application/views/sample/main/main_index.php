
    	<ol id="posts-list" class="hfeed">
    	<?php if(isset($posts)&& is_array($posts)&& count($posts)>0){?>
			<?php foreach ($posts as $post){?>
        	<li>
            	<article class="hentry">
                	<header>
                    	<h2 class="entry-title">
                        	<a href="#" rel="bookmark" title="<?php echo $post->postTitle?>"><?php echo $post->postTitle?></a>
                        </h2>                    </header>
                    <div class="post-photo">
                    	<img src="<?php echo $photoThemePath.$post->mediaTheme?>"/>
                    </div>
                    <footer class="post-info">
                    	<time class="published" datetime="2005-10-10T14:07:00-07:00">
                        	<?php echo $post->postDate?>
                        </time>
					</footer><!--/.post-info-->
                    <div class="entry-content">
                    	<p><?php echo $post->postExcerpt?></p>
                    </div>
                </article>
            </li>
            <?php }
    	} ?>
        </ol><!--/#post-list-->
        
        <?php if(isset($pagination)){?>
	    	<div class='pagination'>
	    		<?php echo $pagination?>
	    	</div>
		<?php }?>
<?php if (isset($post) && is_array($post) && count($post) > 0) { ?>
    <?php $post = $post[0]; ?>
    <article  class=" row text-right article">

	    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    <a href="<?php echo base_url() . 'blog/article/' . $post->postGuid ?>" class=" row">
			    <h1 class=" col-lg-12 text-center article-header" > <?php echo $post->postTitle ?> </h1>
		    </a>

		    <div class="row">
			    <div class=" col-lg-12 text-justify article-content">
				    <?php echo (empty($post->postContent) ? '' : trim($post->postContent)) ?>
			    </div>
		    </div>

		    <div class=" row article-footer" >
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				    <label>موضوع : </label>
				    <?php echo (empty($post->termCaption) ? '' : trim($post->termCaption)) ?>
			    </div>
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				    <label>نویسنده : </label>
				    <?php echo (empty($post->userEmail) ? '' : trim($post->userEmail)) ?>
			    </div>
			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

				    <label>زمان انتشار : </label>
				    <?php echo (empty($post->postDate) ? '' : trim($post->postDate)) ?>
			    </div>
		    </div>
	    </div>
	    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		    <div class="row">
			    <img class=" col-lg-12 img-responsive img-thumbnail article-photo" alt=" <?php echo $post->postTitle ?>" src="<?php echo $photoPath . $post->mediaTheme ?>" width="1024px" height= "600px" />
		    </div>
		    <nav  class="row">
			    <?php if (isset($posts) && is_array($posts) && count($posts) > 0) { ?>
				    <?php foreach ($posts as $side) { ?>
					    <a  href="<?php echo base_url() . 'blog/article/' . $side->postGuid ?>"  target="_blank"  class=" col-lg-6 col-md-6 col-sm-12 col-xs-12  text-right sidepost">

						    <h3 class="row  text-center sidepost-header" > <?php echo $side->postTitle ?> </h3>


						    <img class=" row img-responsive img-thumbnail sidepost-photo" alt=" <?php echo $side->postTitle ?>" src="<?php echo $photoThemePath . $side->mediaTheme ?>" width="300px" height= "200px" />

						    <div class=" row text-justify sidepost-content">
							    <?php echo (empty($side->postExcerpt) ? '' : substr(trim(strip_tags($side->postExcerpt)), 0, 100) . '...') ?>
						    </div>


					    </a >
				    <?php
				    }
			    }
			    ?>

		    </nav>
	    </div>











    </article> 
<?php } ?>



<?php header('Content-type: text/xml'); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url(); ?></loc> 
        <priority>1.0</priority>
    </url>
    
    <url>
        <loc><?php echo base_url(); ?>blog</loc> 
        <priority>1.0</priority>
    </url>
    
    <!-- My code is looking quite different, but the principle is similar -->
    <?php foreach ($data as $url) { ?>
        <url>
            <loc><?php echo base_url() . $url ?></loc>
            <priority>0.5</priority>
        </url>
    <?php } ?>


    <?php if (isset($posts) && is_array($posts) && count($posts) > 0) { ?>
        <?php foreach ($posts as $post) { ?>

            <url>
                <loc><?php echo base_url() . 'blog/article/' . $post->postGuid ?></loc>
                <priority>0.5</priority>
            </url>


            <?php
        }
    }
    ?>

</urlset>
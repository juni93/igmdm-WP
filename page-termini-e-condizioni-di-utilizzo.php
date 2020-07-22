<?php get_header();?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php if(have_posts() ):?>
                <?php while(have_posts()): the_post();?>
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <?php endwhile;?> 
            <?php else: endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<?php if(have_posts() ):?>

    <?php 
        $article_args = array(
            'post_type' => 'post',
            'posts_per_page' => 4
        );
        $articles = new WP_Query($article_args); 
        $i = 1;
    ?>
    
<section id ="home-articles" class="cards">
    <?php while($articles->have_posts()): $articles->the_post();?>
        <article id="no-<?php echo $i ?>-card" class="card">
            <div class="card__img" style='background-image: url("<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>")'></div>
            <a href="<?php the_permalink(); ?>" class="card_link">
                <div class="card__img--hover" style='background-image: url("<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>")'></div>
            </a>
            <div class="card__info">
                <?php $categories = get_the_category();  foreach($categories as $cat):?>
                    <a href="<?php echo get_category_link($cat->term_id) ?>"><span class="card__category"><?php echo $cat->name; ?></span></a>
                <?php endforeach; ?>
                <h3 class="card__title "><?php the_title(); ?></h3>
                <div class="card__by"> da
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="card__author" title="<?php echo esc_attr( get_the_author() ); ?>"> 
                    <?php the_author(); ?>
                    </a>
                </div>
            </div>
        </article>
    <?php $i++; endwhile;?> 
</section>

<?php else: endif; ?>
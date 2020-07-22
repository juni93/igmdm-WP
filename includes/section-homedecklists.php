<?php if(have_posts() ):?>

<?php 
    $decks_args = array(
        'post_type' => 'decklists',
        'posts_per_page' => 4
    );
    $decks = new WP_Query($decks_args); 
?>
<section class="decklists">
    <?php while($decks->have_posts()): $decks->the_post();?>
        <article class="decklist">
            <div class="decklist__img" style='background-image: url("<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>")'></div>
            <a href="<?php the_permalink(); ?>" class="decklist_link">
                <div class="decklist__img--hover" style='background-image: url("<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>")'></div>
            </a>
            <div class="decklist__info">
                <?php $formats = get_the_terms( $post->ID, 'formats' );  foreach($formats as $format):?>
                    <a href="<?php echo get_term_link($format->term_id) ?>"><span class="decklist__category"><?php echo $format->name; ?></span></a>
                <?php endforeach; ?>
                <h3 class="decklist__title "><?php the_title(); ?></h3>
                <div class="decklist__by"> da
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="decklist__author" title="<?php echo esc_attr( get_the_author() ); ?>"> 
                    <?php the_author(); ?>
                    </a>
                </div>
            </div>
        </article>
    <?php endwhile;?> 
</section>


<?php else: endif; ?>
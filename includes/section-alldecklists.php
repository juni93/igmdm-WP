<?php 
    $decklists_args = array(
        'post_type' => 'decklists',
    );
    
    $decklists = new WP_Query($decklists_args); 
?>

<?php if($decklists->have_posts() ):?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="float-right">
                <?php 
                    global $wp_query;
                    $big = 9999;
                    echo paginate_links(
                        array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $wp_query->max_num_pages
                        )
                    );
                ?>
            </div>
            <div class="row mt-5 mb-3">
            <section class="decklists">
                <?php while($decklists->have_posts()): $decklists->the_post();?>
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
            </div>
            <div class="float-right">
                <?php 
                    global $wp_query;
                    $big = 9999;
                    echo paginate_links(
                        array(
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $wp_query->max_num_pages
                        )
                    );
                ?>
            </div>
            <!-- <div class="float-left">
                <?php //previous_posts_link(); ?>
            </div>
            <div class="float-right">
                <?php //next_posts_link(); ?>
            </div> -->
        </div>
    </div>
</div>
<?php else: endif; ?>
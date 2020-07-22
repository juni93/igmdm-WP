<?php 
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'cat' => get_queried_object()->cat_ID,
        'paged' => $paged
    );
    $format = new WP_Query($args);
    if($format->have_posts() ):?>
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
                <section id ="articles" class="cards">
                    <?php while($format->have_posts()): $format->the_post();?>
                        <article class="card">
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
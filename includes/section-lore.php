<?php if(have_posts() ):?>

<?php 
    $lore_args = array(
        'category_name' => 'mtg-articoli-lore',
    );
    $lores = new WP_Query($lore_args); 
?>
<div class="row mt-5 mb-3">
    <section class="cards-wrapper">
        <?php while($lores->have_posts()): $lores->the_post();?>
            <div class="card-grid-space">
                <a class="card" href="<?php the_permalink(); ?>" style='--bg-img: url("<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>")'>
                    <div class="card-content">
                        <h3><?php the_title(); ?></h2></h3>
                        <?php the_excerpt(); ?>
                        <div class="tags">
                            <?php $categories = get_the_category();  foreach($categories as $cat):?>
                                <div class="tag">
                                    <object>
                                        <a href="<?php echo get_category_link($cat->term_id) ?>"><span class="badge badge-primary"><?php echo $cat->name; ?></span></a>
                                    </object>
                                </div>
                            <?php endforeach; ?>
                            <div class="tag">
                                <object>
                                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"> 
                                        <span class="badge badge-primary"><?php the_author(); ?></span>
                                    </a>
                                </object>
                            </div>                    
                        </div>
                    </div>
                </a>
            </div>
        <?php endwhile;?> 
    </section>
</div>
<?php else: endif; ?>
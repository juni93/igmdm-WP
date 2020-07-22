<?php if(have_posts()): while(have_posts()): the_post();?>

    <div class="row">
            <div class="col-md-9">  
                <h1 class="font-weight-bold"><?php the_title(); ?></h1>
                <div class="clearfix">
                    <div class="font-weight-bold float-left">
                    Autore 
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"> 
                        <span class="badge badge-primary"><?php the_author(); ?></span>
                    </a>
                    <br>il <?php the_date('d-m-Y'); ?>
                    </div>
                    <div class="font-weight-bold float-right text-uppercase mr-5">
                        <?php $categories = get_the_category();  foreach($categories as $cat):?>
                            <a href="<?php echo get_category_link($cat->term_id) ?>"><span class="badge badge-primary"><?php echo $cat->name; ?></span></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="text-center">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ?>" class="img-fluid">
                </div>
                <hr>
                <div class="my-5" id="article_content">
                    <?php the_content(); ?>
                </div>
                <br><br>
            </div>  
            <div id="sidebar" class="col-md-3 mt-5">
                <?php if(is_active_sidebar('sidebar-1')): ?>
                    <div></div>
                    <?php dynamic_sidebar('sidebar-1'); ?>
                <?php endif; ?>
            </div>      
        </div>
    </div>

<?php endwhile; else: endif; ?>
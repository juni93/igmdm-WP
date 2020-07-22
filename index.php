<?php get_header(); ?>
<div class="container-fluid main-container mt-5">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
            <h3>Articoli Recenti</h3>
            <div class="justify-content-center pb-3">
                <?php get_template_part('includes/section', 'homearticles');?>
            </div>
            <h3>Decklist Recenti</h3>
            <div class="justify-content-center pb-3">
                <?php get_template_part('includes/section', 'homedecklists');?>
            </div>
        </div>
        <div id="sidebar" class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
        
            <?php if(is_active_sidebar('sidebar-1')): ?>
                <?php dynamic_sidebar('sidebar-1'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
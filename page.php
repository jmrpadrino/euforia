<?php get_header(); the_post(); ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?= the_title('<h1 class="page-title">', '</h1>') ?> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
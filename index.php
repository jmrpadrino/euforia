<?php get_header(); ?>
            <div class="container">
                <?= get_template_part('templates/logo-placeholder') ?>
                <div class="row">
                    <div class="col-sm-9 col-sm-push-3 col-md-8 col-md-offset-1 loop-container">                        
                        <?php
                            if ( have_posts() ){
                                while ( have_posts() ){ the_post();
                                    echo '<article class="archive-article">';
                                    if ( has_post_thumbnail() ){
                                        echo the_post_thumbnail('full', array( 'class' => 'img-responsive'));
                                    }
                                    echo the_title('<h2 class="archve-post-title">', '</h2>');
                                    echo '<div class="archive-article-content">';
                                    the_content();
                                    echo '</div>';
                                    echo '</article>';
                                } // END while have posts
                            }else{
                        ?>
                        <p>No hay post.</p>
                        <?php } //end if have post ?>
                    </div>
                    <div class="col-sm-3 col-sm-pull-9">
                        <h2>Archivo /</h2>
                        <?php
    
                        $year_prev = null;
                        $months = $wpdb->get_results(	"SELECT DISTINCT MONTH( post_date ) AS month ,
                                                        YEAR( post_date ) AS year,
                                                        COUNT( id ) as post_count FROM $wpdb->posts
                                                        WHERE post_status = 'publish'
                                                        and post_type = 'post'
                                                        GROUP BY month , year
                                                        ORDER BY post_date ASC");
                        
                        foreach($months as $month) :
                            $year_current = $month->year;
                            if ($year_current != $year_prev){
                                if ($year_prev != null){?>
                                </ul>
                                <?php } ?>
                            <h3><?php echo $month->year; ?></h3>
                            <ul class="archive-list pull-right">
                            <?php } ?>
                            <li>
                                <a class="archive-month-link" href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)) ?>">
                                    <span class="archive-month"><?php echo _e(ucfirst(date("F", mktime(0, 0, 0, $month->month, 1, $month->year)))) ?></span>
                                    <!--span class="archive-count"><?php echo $month->post_count; ?></span-->
                                </a>
                            </li>
                        <?php $year_prev = $year_current;
                        endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>
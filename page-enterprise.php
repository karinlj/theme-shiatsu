<?php
/*
* Template Name: Page Enterprise 
* Description: Template for Enterprise Page with three columns
*/
?>
<?php get_header(); ?>
    <div class="custom-container">

     
               <!--Section with customized large banner image-->
                           <?php $one = get_theme_mod('page-layout-display');?>

                            <!--If user wants to display Image-->
                            <?php if ( $one == 'Yes') { ?>

                               <section class="page-layout-image banner">
                                    <div class="container">
                                        
                                       <!-- <h1><?php echo get_theme_mod('front-page-layout-heading'); ?>
                                        </h1>-->
                                        
                                         <h1 class="page-title-white">
                                                <?php $title = get_the_title();  echo $title; ?>
                                        </h1> 

                                   </div>
                                   
                              </section>
        
                            <?php } ?>

                            <?php if ( $one == 'No')   { ?>

                                <section class="page-layout-none">

                                </section>
                            <?php } ?> 
        
    

       <!--Section for pages with tree columns-->
      <section class="two-columns">

                         <?php  $args = array(
                                   'post_type' => 'enterprise-posts',
                                   'posts_per_page' => -1
                               );        

                        $loop = new WP_Query( $args );

                          if( $loop->have_posts()) :
          
                            $i = 1; 
                           while( $loop->have_posts()) : $loop->the_post(); ?>
          
                            <div class="enterprise-parent ">

                                <?php if ($i % 2 == 1) { //variabeln /2 ska INTE gå jämnt upp ?>

                                        <div class="enterprise-text-fullwidth" >

                                            <h2><?php the_title(); ?></h2>
                                            <p><?php the_content(); ?></p>
                                        </div>

                                <?php   } ?>

                                <?php if ($i % 2 == 0) {  ?>

                                        <div class="enterprise-text text" >

                                                <h2><?php the_title(); ?></h2>
                                                <p><?php the_content(); ?></p>

                                        </div> <!--/ >-->

                                        <div class="enterprise-text image" >

                                            <?php  the_post_thumbnail('normal-thumbnail'); ?>

                                        </div> <!--/.  >-->

                                <?php   } ?>
                                
                            </div> <!--enterprise-parent-->

                            <?php  $i++;
          
                        endwhile;

                         else : ?>

                            <p><?php __('No Post Found'); ?></p>
                        <?php endif;
                      //now wp is the boss again
                        wp_reset_postdata();
                    ?> 

             
                               <!--get button-section.php-->
                        <?php get_template_part('inc/button-section'); ?>
             
                            <!--get  pdf-section.php-->
                        <?php get_template_part('inc/pdf-section'); ?>
             
            
             
            </section>
        
            <!--<section class="one-image-box-container">
                 <div class="info-field">
                        
                        <?php //get_template_part('parts/one-image-box'); ?>
                        
                </div>
                
                
            </section>-->

</div><!-- /.custom-container -->

    <?php get_footer(); ?>

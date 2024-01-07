<?php /* Template Name: Infos */ 
/**
 * The template for displaying all info pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Forever
 * @version 1.0
 */
edump(__FILE__);
get_header(); ?>


            <main id="main" class="site-main infos" role="main">
                <div class="entry-content">
                <?php
                    #while ( have_posts() ) :
                        edump(the_post());

                       get_template_part( 'template-parts/page/content', 'infos' );


                    #endwhile; // End of the loop.
                    ?>
                </div>
            </main><!-- #main 4everRoot-->
        </div><!-- #site-content -->

<?php
get_footer();
?>
        </div><!-- #site-content-container -->
    </div><!-- #page -->
    </body>
</html>

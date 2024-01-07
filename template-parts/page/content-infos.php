 <?php
/**
 * Template part for displaying page content in infos.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Forever
 * @since 1.0
 * @version 1.0
 */
#edump(__FILE__);
    

    #the_title( '<h1 class="entry-title">', '</h1>' );
    
    the_content();

    forever_edit_link( get_the_ID() );
    #echo('</div>');
    #edump($post);
?>


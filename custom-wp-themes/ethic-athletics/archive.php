<?php get_header(); ?>

<div class="page-content">
<div class="container">

<?php


if ( have_posts() ) : while ( have_posts() ) : the_post();

the_title( ); ?> 
<br><br> 


<?php



if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	the_post_thumbnail();
	?> 

	<br>

	<?php
} 


the_content();

endwhile; else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

   </div>
</div>
<?php get_footer( );?>
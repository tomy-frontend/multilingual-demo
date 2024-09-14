<?php get_header(); ?>

<section class="page-articles">
    <div class="inner">
        <div class="entry-content">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
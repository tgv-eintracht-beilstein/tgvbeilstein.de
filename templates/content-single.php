<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
      <?php
        // Declare global $more (before the loop).
        global $more;

        // Set (inside the loop) to display all content, including text below more.
        $more = 1;

        the_content();

        wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
          'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
          'separator'   => '<span class="screen-reader-text">, </span>',
        ) );

        if ( '' !== get_the_author_meta( 'description' ) ) {
          get_template_part( 'templates/biography' );
        }
      ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <?php twentysixteen_entry_meta(); ?>
      <?php
        edit_post_link(
          sprintf(
            /* translators: %s: Name of current post */
            __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
            get_the_title()
          ),
          '<span class="edit-link">',
          '</span>'
        );
      ?>
    </footer><!-- .entry-footer -->
  </article><!-- #post-## -->
<?php endwhile; ?>

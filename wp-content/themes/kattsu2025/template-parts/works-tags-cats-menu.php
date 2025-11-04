    <?php
      $current_term = get_queried_object();
      $current_term_id = ( is_object( $current_term ) && isset( $current_term->term_id ) ) ? $current_term->term_id : 0;
    ?>
    <ul class="works-cat-list" id="works-cat-list">
      <li class="works-cat-list-item">
        <a href="/works/#works-cat-list" class="works-cat-list-item-tag <?php echo is_post_type_archive( 'works' ) ? ' current' : ''; ?>">
        すべて
        </a>
      </li>

      <?php
      $workstags = get_terms( array('taxonomy' => 'works-tag', 'hide_empty' => true) );
      $workscats = get_terms( array('taxonomy' => 'works-cat', 'hide_empty' => true) );
      ?>
      <?php
      if ( $workscats && ! is_wp_error( $workscats ) ) :
        foreach ( $workscats as $term ) :
          $class = ( isset( $current_term->term_id ) && $current_term->term_id === $term->term_id ) ? ' current' : '';
      ?>
      <li class="works-cat-list-item">
        <a href="<?php echo get_term_link( $term ); ?>#works-cat-list" class="works-cat-list-item-tag <?php echo esc_attr( $class ); ?>">
        <i class="bi bi-folder"></i>&nbsp;<?php echo esc_html( $term->name ); ?>
        </a>
      </li>
      <?php
        endforeach;
      endif;
      ?>
      <?php
      if ( $workstags && ! is_wp_error( $workstags ) ) :
        foreach ( $workstags as $term ) :
          $class = ( isset( $current_term->term_id ) && $current_term->term_id === $term->term_id ) ? ' current' : '';
      ?>
      <li class="works-cat-list-item">
        <a href="<?php echo get_term_link( $term ); ?>#works-cat-list" class="works-cat-list-item-tag <?php echo esc_attr( $class ); ?>">
        #<?php echo esc_html( $term->name ); ?>
        </a>
      </li>
      <?php
        endforeach;
      endif;
      ?>
    </ul>
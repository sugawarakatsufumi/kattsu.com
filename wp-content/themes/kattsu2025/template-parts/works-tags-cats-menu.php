    <ul class="works-cat-list">
      <li class="works-cat-list-item">
        <a href="/works/" class="works-cat-list-item-tag">
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
      ?>
      <li class="works-cat-list-item">
        <a href="<?php echo get_term_link( $term ); ?>" class="works-cat-list-item-tag">
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
      ?>
      <li class="works-cat-list-item">
        <a href="<?php echo get_term_link( $term ); ?>" class="works-cat-list-item-tag">
        #<?php echo esc_html( $term->name ); ?>
        </a>
      </li>
      <?php
        endforeach;
      endif;
      ?>
    </ul>
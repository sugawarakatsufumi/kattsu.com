        <?php 
          $thumbPc = get_field('screenshot_pc_thumb');
          $thumbSp = get_field('screenshot_sp_thumb');
          $workstags = get_the_terms( get_the_ID(), 'works-tag' );
          $workscats = get_the_terms( get_the_ID(), 'works-cat' );
          $dtpFlg = in_array( 'dtp', wp_list_pluck( $workscats, 'slug' ) );
        ?>
        <a href="<?php the_permalink(); ?>" class="works-item-link">
          <figure class="works-item-figure <?php if ($dtpFlg) echo 'cat-dtp'; ?>">
            <div class="works-item-pc-img"><img src="<?php echo $thumbPc["sizes"]["medium_large"]; ?>" alt="<?php echo get_the_title(); ?> イメージ"></div>
            <?php if (!$dtpFlg) :?>
              <div class="works-item-sp-img"><img src="<?php echo $thumbSp["sizes"]["medium_large"]; ?>" alt="<?php echo get_the_title(); ?>イメージ スマホ表示"></div>
            <?php endif; ?>
          </figure>
          <div class="works-item-body">
            <h3 class="works-item-title"><?php echo get_the_title(); ?></h3>
          </div>
        </a>
        <?php if ( $workstags && ! is_wp_error( $workstags ) ) :?>
          <div class="works-item-tags">
            <?php foreach ( $workscats as $workscat ): ?>
              <a href="<?php echo get_term_link($workscat); ?>" class="works-item-tag"><i class="bi bi-folder"></i>&nbsp;<?php echo $workscat->name; ?></a>
            <?php endforeach; ?>
            <?php foreach ( $workstags as $workstag ): ?>
              <a href="<?php echo get_term_link($workstag); ?>" class="works-item-tag">#<?php echo $workstag->name; ?></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
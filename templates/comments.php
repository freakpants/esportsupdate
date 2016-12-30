<?php
if (post_password_required()) {
  return;
}

  $comment_field = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
  
  $args = array(
  "title_reply" => __( 'Hinterlass hier deinen Senf. Oder lass es bleiben.' ), "comment_field" => $comment_field , 
  "label_submit" => __( 'Kommentar abschiessen' ) );
  
  comment_form( $args );

?>

<section id="comments" class="comments">
  <?php if (have_comments()) : ?>
    <?php printf(_nx('1 Kommentar', '%1$s Kommentare', get_comments_number(), 'comments title', 'sage'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?>

    <ol class="comment-list">
      <?php 
	  
	  $args = array( 'style' => 'ol', 'short_ping' => true, 'reply_text' => __( 'Antworten' ) ) ;
	  
	  wp_list_comments( $args ); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'sage')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'sage')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>
  <?php endif; // have_comments() ?>

  <?php if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('Comments are closed.', 'sage'); ?>
    </div>
  <?php endif; ?>

  <?php 
  
 ?>
</section>

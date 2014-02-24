<div class="main-featured-loop">
  
  <div class="band-cloud clearfix">
    <h4>Popular bands on Eaten by Monsters</h4>
    <?php $args = array(  'smallest'  => 1, 
                          'largest'   => 2.5,
                          'unit'      => 'em', 
                          'number'    => 20,// how many tags to show
                          'orderby'   => 'count',//'name', 
                          'order'     => 'DESC',
                          'topic_count_text_callback' => 'ebm_topic_count_text',
                          'exclude'   => null,
                          'taxonomy'  => 'post_tag');
    wp_tag_cloud($args); ?>
    <a class="band-tags-link" href="#">See all...</a>
  </div><!-- .band-cloud -->

</div><!-- .main-featured-loop -->
<div class="module01">
  <ul class="slider-selectors clearfix">
    <li class="slider-selector selector-one active"><a>Latest Article</a></li>
    <li class="slider-selector selector-two"><a>Yearly Top Tens</a></li>
    <li class="slider-selector selector-three"><a>Never Miss a Post&hellip;</a></li>
  </ul><!-- .slider-selectors -->
  <div class="slider">
    <div class="slider-inner clearfix">
      <div class="slide one featured">
        <?php get_template_part('module-featured'); ?>
      </div><!-- .slide-one -->
      <div class="slide two top-ten">
        <?php get_template_part('module-top-ten'); ?>
      </div><!-- .slide-two -->
      <div class="slide three signup">
        <?php get_template_part('module-signup'); ?>
      </div><!-- .slide-three -->
    </div><!-- .slider-inner -->
  </div><!-- .slider -->
</div><!-- .module01 -->
<div class="module01">
  <ul class="slider-selectors clearfix">
    <li class="slider-selector selector-one"><a>Reviews by Date</a></li>
    <li class="slider-selector selector-two active"><a>Yearly Top Tens</a></li>
    <li class="slider-selector selector-three"><a>Never Miss a Post&hellip;</a></li>
  </ul><!-- .slider-selectors -->
  <div class="slider">
    <div class="slider-inner clearfix">
      <div class="slide slide-one">
        <?php get_template_part('module-featured'); ?>
      </div><!-- .slide-one -->
      <div class="slide slide-two">
        <?php get_template_part('module-top-ten'); ?>
      </div><!-- .slide-two -->
      <div class="slide slide-three">
        <?php get_template_part('module-signup'); ?>
      </div><!-- .slide-three -->
    </div><!-- .slider-inner -->
  </div><!-- .slider -->
</div><!-- .module01 -->
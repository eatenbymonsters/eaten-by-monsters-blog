<?php include"header.php"; ?>
  
  <section class="aboveTheFold">

    <div class="homeSliderWrap sliderOuter">
    </div>
    
    <div class="homeSearchWrapper" id="homeSearchGoTo">
    </div>

  </section>

  <section id="homeContent" class="homeContent">
    <?php if (have_posts()) :
      while (have_posts()) :
        the_post(); ?>

        <h1 class="homeSlogan">We specialise in <strong>luxury self catering</strong> <span class="amp">&</span> <strong>exceptional holiday homes</strong> in Cornwall</h1>

        <?php the_content(); ?>
        <div class="hiddenInfo">
          <?//=get_field('seo_hidden_on_page'); ?>
        </div>
      <?php endwhile;
    endif; ?>

  </section>

  <section id="homeArchive" class="homeArchive">
  </section>

  <section class="homeReviews">
  </section>

<?php include"footer.php"; ?>
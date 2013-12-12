<div class="search-wrapper">
  <div class="show-search-button search-button" title="Search">
    <span aria-hidden="true" data-icon="&#xe601;"></span>
    <span class="visuallyhidden">Show search form</span>
  </div><!-- .show-search-button -->
  <form role="search" method="get" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <input type="search" value="" name="s" id="s" placeholder="Search&hellip;" />
    <input type="submit" id="searchsubmit" value="search" />
    <div class="hide-search-button search-button">
      <span aria-hidden="true" data-icon="&#215;"></span>
      <span class="visuallyhidden">Hide search form</span>
    </div><!-- .hide-search-button -->
  </form>
</div><!-- .search-wrapper -->
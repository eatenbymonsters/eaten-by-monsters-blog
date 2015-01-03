<section>
    <h2>Bands that have been tagged:</h2>
    <?php // AJAX search method ?>

    <div class="bl_search">
        <label for="bl_search">Search for a band:</label>
        <input type="search" id="bl_searchInput" class="bl_search" name="bl_search">
    </div>
    <div class="loadingImage">Loading...</div>
    <div class="bl_output">
        
    </div>


    <?php /* // Traditional WP method ?>
    <?php
        // Declare arguments for retrieving the bands data
        $args = array(
            'orderby'   => 'count',
            'order'     => 'DESC'
            );
        // Retrieve the bands data
        $bandNames = get_terms('band',$args);
        // var_dump($bandNames);
        
        if (isset($bandNames) && !is_wp_error($bandNames)) {
            // Set up a var to count the number of items as they are looped though
            $i = 1;
            // Loop through the returned bands data
            foreach ( $bandNames as $band ){
                $bandName = $band->name;
                $bandSlug = $band->slug;
                $bandCount = $band->count;
                // if there have been more than 5 items looped though, stop looping
                // if ($i > 5) {
                //     return;
                // }
                ?>
                    <article class="band">
                        <?php if ( $bandCount > 1 ) { ?>
                            <?= $bandCount; ?> posts about <a href="/bands/<?= $bandSlug; ?>"><?= $bandName; ?></a>
                        <?php } else { ?>
                            1 post about <a href="/bands/<?= $bandSlug; ?>"><?= $bandName; ?></a>
                        <?php } ?>
                    </article>
                <?php
                $i++;
            }
        }
    ?>
    <?php //*/ ?>
</section>
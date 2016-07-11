<?php
/**
 * default search form
 */
?>
<form id="searchform" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
        <input id="s" type="search" placeholder="Rechercher" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" />
        <button id="searchsubmit" class="icon-ios-search-strong" type="submit"></button>
    </div>
</form>

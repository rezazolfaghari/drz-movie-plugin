<?php

//register shortcode for movie posttype
add_shortcode('movie', 'registerMovieShortcode');
function registerMovieShortcode($atts)
{
    $args = array(
        'post_type' => 'movie',
    );
    $counter = 0;
    foreach ($atts as $key => $att) {
        if ($key != 'order' && taxonomy_exists($key)) {
            if ($counter == 1) {
                $args['tax_query']['relation'] = 'AND';
            }
            if (str_contains($att, ',')) {
                $terms = explode(',', $att);
            } else {
                $terms = $att;
            }
            $args['tax_query'][] = [
                'taxonomy' => $key,
                'field' => 'slug',
                'terms' => $terms,
            ];
            $counter += 1;
        }
    }
    if (isset($atts['orderby']))
        $args['orderby'] = in_array($atts['orderby'], array('none', 'ID', 'author', 'title', 'date', 'comment_count')) ? $atts['orderby'] : '';
    if (isset($atts['order']))
        $args['order'] = in_array($atts['order'], array('ASC', 'DESC')) ? $atts['order'] : '';

    $query = new WP_Query($args);

    return drzGenerateTemplate($query->posts);
}


//generate post card with use bootstrap
function drzGenerateTemplate($posts)
{
    $html = '';
    $html .= "<div class='container'><div class='row'>";
    foreach ($posts as $post) {
        $cover = get_the_post_thumbnail_url($post->ID);
        $title = $post->post_title;
        $excerpt = $post->post_excerpt;
        $rateTitle = __(' Imdb Rate :' , textDomain);
        $rate = get_post_meta($post->ID, 'rate', true);
        $html .= "<div class='col-lg-6 col-md-6 col-12'><div class='drz-card'>";
        $html .= "<div class='cover'><img src='$cover' ></div>";
        $html .= "<div class='title'><h3>$title</h3></div>";
        $html .= "<div class='excerpt'><p>$excerpt</p></div>";
        $html .= "<div class='rate'><span> $rateTitle $rate</span></div>";
        $html .= "</div></div>";
    }
    $html .= "</div></div>";

    return $html;
}
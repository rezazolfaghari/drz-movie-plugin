<?php

function movieMetabox()
{
    /*----------------------- AboutUs -----------------------*/
    $about = new_cmb2_box(array(
        'id' => 'movie_metabox',
        'title' => __('more info', textDomain),
        'object_types' => array('movie'),
    ));
    $about->add_field(array(
        'name' => __('rate', textDomain),
        'type' => 'text',
        'id' => 'rate',
        'default'=>rand(0,10)
    ));
}

add_action('cmb2_admin_init', 'movieMetabox');

function Meta($key)
{
    return get_post_meta(get_the_ID(), $key, true);
}

?>
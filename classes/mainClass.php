<?php

class movie
{
    function getMovies($taxonomy = "", $term = "", $id = "")
    {
        global $wpdb;
        if ($id != "") {
            $sql = "SELECT * FROM {$wpdb->prefix}posts WHERE ID =$id ";
            $result = $wpdb->get_results($sql);
        } else {
            if ($taxonomy != "" && $term != "" && $id == "") {
                $args = array(
                    'post_type' => 'movie',
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'slug',
                            'terms' => $term
                        )
                    )
                );
                $query = new WP_Query($args);
                $result = $query->posts;
            }
            else{
                $sql = "SELECT * FROM {$wpdb->prefix}posts WHERE post_type ='movie' ";
                $result = $wpdb->get_results($sql);
            }
        }
        return (object)$result;
    }

    function getTerms($taxonomy, $termId = "")
    {
        global $wpdb;
        if ($termId != "") {
            $sql = "SELECT * FROM {$wpdb->prefix}terms WHERE term_id=$termId  ";
            $result = $wpdb->get_results($sql);
        } else {
            $sql = "SELECT term_id FROM {$wpdb->prefix}term_taxonomy WHERE taxonomy ='$taxonomy' ";
            $termsId = $wpdb->get_results($sql);
            foreach ($termsId as $item) {
                $termId = (int)$item->term_id;
                $sql = "SELECT * FROM {$wpdb->prefix}terms WHERE term_id ='$termId' ";
                $row = $wpdb->get_row($sql);
                $result[] = [
                    'term_id' => $row->term_id,
                    'term_name' => $row->name,
                    'term_slug' => $row->slug,
                    'term_group' => $row->term_group,
                ];
            }
        }
        return (object)$result;
    }
}
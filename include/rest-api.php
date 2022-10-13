<?php

add_action('rest_api_init', function () {
    register_rest_route('v2', '/movies', [
        'method' => WP_REST_Server::READABLE,
        'callback' => 'movieCallback',
    ]);
    register_rest_route('v2', '/movies/genres', [
        'method' => WP_REST_Server::READABLE,
        'callback' => 'genresCallback',
    ]);
    register_rest_route('v2', '/movies/directors', [
        'method' => WP_REST_Server::READABLE,
        'callback' => 'directorsCallback',
    ]);
    register_rest_route('v2', '/movies/writers', [
        'method' => WP_REST_Server::READABLE,
        'callback' => 'writerCallback',
    ]);
    register_rest_route('v2', '/movies/actors', [
        'method' => WP_REST_Server::READABLE,
        'callback' => 'actorsCallback',
    ]);
});

function movieCallback($request)
{
    $postId = !empty($_GET["id"]) ? $_GET["id"] : '';
    $taxonomy = !empty($_GET["taxonomy"]) ? $_GET["taxonomy"] : '';
    $term = !empty($_GET["term"]) ? $_GET["term"] : '';
    $movies = new movie();
    $json = $movies->getMovies($taxonomy, $term, $postId);
    return rest_ensure_response($json);
}

function genresCallback($request)
{
    $termId = !empty($_GET["id"]) ? $_GET["id"] : '';
    $movies = new movie();
    $json = $movies->getTerms('genre', $termId);
    return rest_ensure_response($json);
}

function directorsCallback($request)
{
    $termId = !empty($_GET["id"]) ? $_GET["id"] : '';
    $movies = new movie();
    $json = $movies->getTerms('director', $termId);
    return rest_ensure_response($json);
}

function writersCallback($request)
{
    $termId = !empty($_GET["id"]) ? $_GET["id"] : '';
    $movies = new movie();
    $json = $movies->getTerms('writer', $termId);
    return rest_ensure_response($json);
}


function actorsCallback($request)
{
    $termId = !empty($_GET["id"]) ? $_GET["id"] : '';
    $movies = new movie();
    $json = $movies->getTerms('actor', $termId);
    return rest_ensure_response($json);
}



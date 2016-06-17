<?php
// Routes

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;



$app->get('/posts', function(ServerRequestInterface $request, ResponseInterface $response, $args){
    $tab = new Application_Model_DbTable_Post();

    $posts = $tab->fetchAll();

    // $response->getBody()->write(json_encode($posts->toArray()));
});
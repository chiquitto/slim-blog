<?php
// Routes

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/posts', function(ServerRequestInterface $request, ResponseInterface $response, $args){
    $tab = new Application_Model_DbTable_Post();
    $posts = $tab->fetchAll();

    return $response->withJson($posts->toArray());
});

$app->get('/post/{id}', function(\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
    $tab = new Application_Model_DbTable_Post();
    $post = $tab->fetchRow("idpost = " . $args['id']);
    
    if (!$post) {
        $response->withStatus(404);
        return $response->withJson(array(
            'msg' => 'Post inexistente'
        ));
    }

    return $response->withJson($post->toArray());
});
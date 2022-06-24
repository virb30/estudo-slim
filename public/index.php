<?php

require __DIR__."/../vendor/autoload.php";

use App\Controllers\BooksController;
use App\Controllers\CreateBooksController;
use App\Requests\CreateBookRequest;
use App\Requests\Handlers\CustomRequestStrategy;

$configuration = [
  'settings' => [
      'displayErrorDetails' => true,
  ],
];

// $c = new \Slim\Container($configuration);

$app = new \Slim\App($configuration);

$c = $app->getContainer();

$c['foundHandler'] = function($container) {

  return new CustomRequestStrategy($container->get('environment'));
};

$app->get('/books', BooksController::class.":index");

$app->get('/', function($request, $response, $args) {
  return $response->withJson(['message' => 'Hello World']);
});

$app->post('/books', BooksController::class.":create");

$app->post('/books2', function(CreateBookRequest $request, $response, $args) {
  return $response->withJson(['data' => $request->validated(), 'uri' => 'books2']);
});

$app->post('/books3', function($request, $response, $args) {
  return $response->withJson(['data' => $request->getParsedBody(), 'uri' => 'books3']);
});

$app->post('/books4', CreateBooksController::class);

$app->run();
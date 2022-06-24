<?php

namespace App\Controllers;

use App\Requests\CreateBookRequest;

class BooksController
{
  public function create(CreateBookRequest $request, $response, $args)
  {
    $data = $request->validated();
    return $response->withJson(['message' => 'success', 'data' => $data]);
  }

  public function createWithoutValidate($request, $response, $args)
  {
    var_dump($request);
    $data = $request->getParsedBody();
    return $response->withJson(['message' => 'success', 'data' => $data]);
  }

  public function index($request, $response, $args)
  {
    return $response->withJson(['books' => []]);
  }
}
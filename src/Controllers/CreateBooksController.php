<?php

namespace App\Controllers;

use App\Requests\CreateBookRequest;

class CreateBooksController
{
  public function __invoke(CreateBookRequest $request, $response, $args)
  {
    // $data = $request->validated();
    $data = $request->getParsedBody();
    return $response->withJson(['message' => 'success', 'data' => $data]);
  }
}
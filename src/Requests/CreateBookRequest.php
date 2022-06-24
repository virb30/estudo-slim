<?php

namespace App\Requests;

use Psr\Http\Message\ServerRequestInterface;

class CreateBookRequest extends FormRequest
{
  protected function rules()
  {
    return [];
  }
}
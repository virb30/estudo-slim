<?php

namespace App\Requests;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Environment;
use Slim\Http\Request;

class FormRequest extends Request implements IFormRequest
{
  protected $data;  

  public static function createFromEnvironment(Environment $environment)
  {
    return parent::createFromEnvironment($environment);
  }

  public function validated()
  {
    $this->data = $this->getParsedBody();
    var_dump('validating');
    return $this->data;
  }

  protected function rules()
  {
    return [];
  }
}
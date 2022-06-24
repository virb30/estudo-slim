<?php

namespace App\Requests;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;

class SimpleRequest extends Request implements ServerRequestInterface
{
  public $request;

  public function __construct(ServerRequestInterface $request)
  {
    $this->request = $request;
  }

  public function getServerParams()
  {
    return $this->request->getServerParams();
  }

  public function getCookieParams()
  {
    return $this->request->getCookieParams();
  }

  public function withCookieParams(array $cookies)
  {
    return $this->request->withCookieParams($cookies);
  }

  public function getQueryParams()
  {
    return $this->request->getQueryParams();
  }

  public function withQueryParams(array $query)
  {
    return $this->request->withQueryParams($query);
  }

  public function getUploadedFiles()
  {
    return $this->request->getUploadedFiles();
  }

  public function withUploadedFiles(array $uploadedFiles)
  {
    return $this->request->withUploadedFiles($uploadedFiles);
  }

  public function getParsedBody()
  {
    return $this->request->getParsedBody();
  }

  public function withParsedBody($data)
  {
    return $this->request->withParsedBody($data);
  }


  public function getAttributes()
  {
    return $this->request->getAttributes();
  }


  public function getAttribute($name, $default = null)
  {
    return $this->request->getAttribute($name, $default);
  }


  public function withAttribute($name, $value)
  {
    return $this->request->withAttribute($name, $value);
  }


  public function withoutAttribute($name)
  {
    return $this->request->withoutAttribute($name);
  }
}
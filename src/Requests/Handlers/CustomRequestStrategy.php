<?php

namespace App\Requests\Handlers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionFunction;
use ReflectionMethod;
use Slim\Interfaces\Http\EnvironmentInterface;
use Slim\Interfaces\InvocationStrategyInterface;


class CustomRequestStrategy implements InvocationStrategyInterface
{
  private $env;

  public function __construct(EnvironmentInterface $environment)
  {
    $this->env = $environment;
  }

  public function __invoke(callable $callable, ServerRequestInterface $request, ResponseInterface $response, array $routeArguments)
  {
    if(is_array($callable)) {
      $r = new ReflectionMethod($callable[0], $callable[1]);
    } else {
      $r = new ReflectionFunction($callable);
    }  
    
    $parameters = $r->getParameters();
    foreach ($parameters as $parameter) {
      if ($parameter->getName() === 'request') {
        if($parameter->hasType()) {
          $parameterType = $parameter->getType()->getName();
          $request = $parameterType::createFromEnvironment($this->env);
        }
      }
    }
  
    return call_user_func($callable, $request, $response, $routeArguments);
  }
}
<?php
namespace App\Middleware;
class CsrfViewMiddleware
{
    public $container;
    public function __construct($c)
    {
        $this->container = $c;
    }
    public function __invoke($req, $resp, $next)
    {
        $this->container['twig_c']->addGlobal('csrf',
            [
                'field' => '
                    <input type="hidden" name="'. $this->container['csrf']->getTokenNameKey() . '" 
                    value="' . $this->container['csrf']->getTokenName() . '"> 
                    <input type="hidden" name="' . $this->container['csrf']->getTokenValueKey() . '" 
                    value="' . $this->container['csrf']->getTokenValue() . '">                    
                ',
            ]);
        $resp = $next($req, $resp);
        return $resp;
    }
}
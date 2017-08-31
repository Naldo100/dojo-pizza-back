<?php
namespace Dojo\V1\Rest\Pizza;

class PizzaResourceFactory
{
    public function __invoke($services)
    {
        return new PizzaResource($services);
    }
}

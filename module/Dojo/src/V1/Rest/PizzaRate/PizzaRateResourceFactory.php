<?php
namespace Dojo\V1\Rest\PizzaRate;

class PizzaRateResourceFactory
{
    public function __invoke($services)
    {
        return new PizzaRateResource($services);
    }
}

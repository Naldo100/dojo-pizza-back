<?php
namespace Dojo\V1\Rest\Member;

class MemberResourceFactory
{
    public function __invoke($services)
    {
        return new MemberResource($services);
    }
}

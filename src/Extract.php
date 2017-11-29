<?php
declare(strict_types=1);

namespace Martinezdelariva\Hydrator;

class Extract
{
    public function __invoke($object): array
    {
        $closure = function (): array {
            return get_object_vars($this);
        };

        return \Closure::fromCallable($closure)->call($object);
    }
}

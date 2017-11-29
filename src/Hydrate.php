<?php
declare(strict_types=1);

namespace Martinezdelariva\Hydrator;

class Hydrate
{
    public function __invoke(string $class, array $values)
    {
        $instance = (new \ReflectionClass($class))->newInstanceWithoutConstructor();
        $closure  = function (array $values) {
            foreach ($values as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        };

        \Closure::fromCallable($closure)->call($instance, $values);

        return $instance;
    }
}

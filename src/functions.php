<?php

namespace Martinezdelariva\Hydrator;

function hydrate($object, array $values) {
    return (new Hydrate)($object, $values);
}

function extract($object): array {
    return (new Extract)($object);
}

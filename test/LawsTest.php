<?php
declare(strict_types=1);

namespace Martinezdelariva\Test;

use function Martinezdelariva\Hydrator\hydrate;
use function Martinezdelariva\Hydrator\extract;
use PHPUnit\Framework\TestCase;

class LawsTest extends TestCase
{
    public function test_hydrate_after_extract_return_equal_object()
    {
        $foo    = new Foo(123, "the string", [1 => "a"]);
        $result = hydrate(Foo::class, extract($foo));

        $this->assertEquals($result, $foo);
        $this->assertNotSame($result, $foo);
    }

    public function test_extract_after_hydrate_return_equal_array()
    {
        $array  = [
            "int"     => 1,
            "string"  => "the string",
            "array"   => [1 => "a"],
            "null"    => null,
            "default" => "the default",
        ];
        $result = extract(hydrate(Foo::class, $array));

        $this->assertEquals($result, $array);
    }
}

class Foo
{
    private $int;
    private $string;
    private $array;
    private $null;
    private $default = "the default";

    public function __construct(int $int, string $string, array $array, $null = null)
    {
        $this->int    = $int;
        $this->null   = $null;
        $this->string = $string;
        $this->array  = $array;
    }
}

<?php
declare(strict_types=1);

namespace FluidTYPO3\TestProviderExtension\Transformed;

class CustomObject
{
    public string $foo;
    public string $bar;
    public int $baz;

    public function __construct(array $data)
    {
        $this->foo = $data['propertyFoo'] ?? '';
        $this->bar = $data['propertyBar'] ?? '';
        $this->baz = $data['propertyBaz'] ?? 0;
    }
}
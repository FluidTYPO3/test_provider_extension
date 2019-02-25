<?php
namespace FluidTYPO3\TestProviderExtension\UserFunction;

/**
 * Class CustomClass
 */
class CustomClass
{
    /**
     * @var string
     */
    protected $propertyFoo;

    /**
     * @var string
     */
    protected $propertyBar;

    /**
     * CustomClass constructor.
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        foreach ($properties as $name => $value) {
            $this->$name = $value;
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            'I am a %s, my properties are: propertyFoo=%s, propertyBar=%s',
            static::class,
            $this->propertyFoo,
            $this->propertyBar
        );
    }

    /**
     * @return string
     */
    public function getPropertyFoo()
    {
        return $this->propertyFoo;
    }

    /**
     * @param string $propertyFoo
     * @return void
     */
    public function setPropertyFoo($propertyFoo)
    {
        $this->propertyFoo = $propertyFoo;
    }

    /**
     * @return string
     */
    public function getPropertyBar()
    {
        return $this->propertyBar;
    }

    /**
     * @param string $propertyBar
     * @return void
     */
    public function setPropertyBar($propertyBar)
    {
        $this->propertyBar = $propertyBar;
    }
}

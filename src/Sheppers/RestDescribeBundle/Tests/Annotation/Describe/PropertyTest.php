<?php

namespace Sheppers\RestDescribeBundle\Tests\Annotation\Describe;

use Sheppers\RestDescribeBundle\Annotation\Describe\Property;

class PropertyTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $options = array(
            'name' => 'Test name.'
        );
        $property = new Property($options);

        $this->assertSame($options['name'], $property->getName());
    }

    public function testGetDescription()
    {
        $options = array(
            'description' => 'Test description.'
        );
        $property = new Property($options);

        $this->assertSame($options['description'], $property->getDescription());
    }

    public function testGetFormat()
    {
        $options = array(
            'format' => 'Test format.'
        );
        $property = new Property($options);

        $this->assertSame($options['format'], $property->getFormat());
    }

    public function testGetType()
    {
        $options = array(
            'type' => 'Test type.'
        );
        $property = new Property($options);

        $this->assertSame($options['type'], $property->getType());
    }

    public function testGetSample()
    {
        $options = array(
            'sample' => 'Test sample.'
        );
        $property = new Property($options);

        $this->assertSame($options['sample'], $property->getSample());
    }

    public function testGetDefault()
    {
        $options = array(
            'default' => 'Test default.'
        );
        $property = new Property($options);

        $this->assertSame($options['default'], $property->getDefault());
    }

    public function testGetModel()
    {
        $options = array(
            'model' => 'Test model.'
        );
        $property = new Property($options);

        $this->assertSame($options['model'], $property->getModel());
    }
}

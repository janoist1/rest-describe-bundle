<?php

namespace Sheppers\RestDescribeBundle\Tests\Annotation\Describe;

use Sheppers\RestDescribeBundle\Annotation\Describe\Parameter;

class ParameterTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $options = array(
            'name' => 'Test name.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['name'], $parameter->getName());
    }

    public function testGetDescription()
    {
        $options = array(
            'description' => 'Test description.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['description'], $parameter->getDescription());
    }

    public function testGetFormat()
    {
        $options = array(
            'format' => 'Test format.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['format'], $parameter->getFormat());
    }

    public function testGetType()
    {
        $options = array(
            'type' => 'Test type.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['type'], $parameter->getType());
    }

    public function testGetLocation()
    {
        $options = array(
            'location' => 'Test location.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['location'], $parameter->getLocation());
    }

    public function testIsRequired()
    {
        $options = array(
            'required' => true
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['required'], $parameter->isRequired());
    }

    public function testGetSample()
    {
        $options = array(
            'sample' => 'Test sample.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['sample'], $parameter->getSample());
    }

    public function testGetDefault()
    {
        $options = array(
            'default' => 'Test default.'
        );
        $parameter = new Parameter($options);

        $this->assertSame($options['default'], $parameter->getDefault());
    }
}

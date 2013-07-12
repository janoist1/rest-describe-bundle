<?php

namespace Sheppers\RestDescribeBundle\Tests\Annotation\Describe;

use Sheppers\RestDescribeBundle\Annotation\Describe\Resource;

class ResourceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $options = array(
            'name' => 'Test name.'
        );
        $resource = new Resource($options);

        $this->assertSame($options['name'], $resource->getName());
    }

    public function testGetDescription()
    {
        $options = array(
            'description' => 'Test description.'
        );
        $resource = new Resource($options);

        $this->assertSame($options['description'], $resource->getDescription());
    }
    
    public function testGetModel()
    {
        $options = array(
            'model' => 'Test model.'
        );
        $resource = new Resource($options);

        $this->assertSame($options['model'], $resource->getModel());
    }
    
    public function testGetRelationships()
    {
        $options = array(
            'relationships' => array()
        );
        $resource = new Resource($options);

        $this->assertSame($options['relationships'], $resource->getRelationships());
    }
}

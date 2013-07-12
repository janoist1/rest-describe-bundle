<?php

namespace Sheppers\RestDescribeBundle\Tests\Annotation\Describe;

use Sheppers\RestDescribeBundle\Annotation\Describe\Request;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testGetModel()
    {
        $options = array(
            'model' => 'Test model.'
        );
        $request = new Request($options);

        $this->assertSame($options['model'], $request->getModel());
    }
    
    public function testGetParameters()
    {
        $options = array(
            'parameters' => array()
        );
        $request = new Request($options);

        $this->assertSame($options['parameters'], $request->getParameters());
    }
}

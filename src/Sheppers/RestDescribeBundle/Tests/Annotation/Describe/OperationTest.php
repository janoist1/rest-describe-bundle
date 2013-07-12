<?php

namespace Sheppers\RestDescribeBundle\Tests\Annotation\Describe;

use Sheppers\RestDescribeBundle\Annotation\Describe\Operation;
use Sheppers\RestDescribeBundle\Annotation\Describe\Request;
use Sheppers\RestDescribeBundle\Annotation\Describe\Response;

class OperationTest extends \PHPUnit_Framework_TestCase
{
    public function testGetName()
    {
        $options = array(
            'name' => 'Test name.'
        );
        $operation = new Operation($options);

        $this->assertSame($options['name'], $operation->getName());
    }

    public function testGetDescription()
    {
        $options = array(
            'description' => 'Test description.'
        );
        $operation = new Operation($options);

        $this->assertSame($options['description'], $operation->getDescription());
    }

    public function testGetScope()
    {
        $options = array(
            'scope' => 'Test scope.'
        );
        $operation = new Operation($options);

        $this->assertSame($options['scope'], $operation->getScope());
    }

    public function testGetRequest()
    {
        $options = array(
            'request' => new Request(array())
        );
        $operation = new Operation($options);

        $this->assertSame($options['request'], $operation->getRequest());
    }

    public function testGetResponse()
    {
        $options = array(
            'response' => new Response(array())
        );
        $operation = new Operation($options);

        $this->assertSame($options['response'], $operation->getResponse());
    }
}

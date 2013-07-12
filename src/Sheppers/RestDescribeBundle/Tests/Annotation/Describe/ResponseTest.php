<?php

namespace Sheppers\RestDescribeBundle\Tests\Annotation\Describe;

use Sheppers\RestDescribeBundle\Annotation\Describe\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCodes()
    {
        $options = array(
            'codes' => array()
        );
        $response = new Response($options);

        $this->assertSame($options['codes'], $response->getCodes());
    }
    
    public function testIsEmpty()
    {
        $options = array(
            'empty' => true
        );
        $response = new Response($options);

        $this->assertSame($options['empty'], $response->isEmpty());
    }
}

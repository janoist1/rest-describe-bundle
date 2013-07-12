<?php

namespace Sheppers\RestDescribeBundle\Tests\Processor;

use Sheppers\RestDescribeBundle\Processor\DescribeOperationProcessor;
use Sheppers\RestDescribeBundle\Annotation\Describe;
use Sheppers\RestDescribeBundle\Entity;
use Symfony\Component\Routing\Route;
use Doctrine\ORM\EntityManager;

class DescribeOperationProcessorTest extends \PHPUnit_Framework_TestCase
{
    public function testSupports()
    {
        $resource = new Entity\Resource('Test res');
        $describeOperation = new Describe\Operation(array());
        $entityOperation = new Entity\Operation('Test op', $resource);
        $describeProperty = new Describe\Property(array());
        $entityProperty = new Entity\Property('Test prop', $resource);
        $processor = $this->getProcessor();

        $this->assertTrue($processor->supports($describeOperation, $entityOperation));
        $this->assertFalse($processor->supports($describeProperty, $entityProperty));
    }

    public function testProcess()
    {
        $request = new Describe\Request(array());
        $response = new Describe\Response(array());
        $mockOptions = array(
            'description' => 'Test description',
            'name' => 'Test name',
            'scope' => 'Test scope',
            'method' => 'POST',
            'uri' => '/test/path',
            'request' => $request,
            'response' => $response,
        );
        $annotation = new Describe\Operation($mockOptions);
        $route = $this
            ->getMockBuilder('Symfony\Component\Routing\Route')
            ->disableOriginalConstructor()
            ->setMethods(array('getMethods', 'getPath'))
            ->getMock();
        $route->expects($this->once())
            ->method('getMethods')
            ->will($this->returnValue(array('POST')));
        $route->expects($this->once())
            ->method('getPath')
            ->will($this->returnValue('/test/path'));
        $mockMeta = array(
            'description' => 'Test description',
            'name' => 'Test name',
            'scope' => 'Test scope',
            'method' => 'Test method',
            'uri' => 'Test uri',
            'route' => $route,
        );
        $resource = new Entity\Resource('Test res');
        $operation = new Entity\Operation('Test op', $resource);
        $operation2 = new Entity\Operation('Test op', $resource);
        $operation2
            ->setDescription($mockOptions['description'])
            ->setName($mockOptions['name'])
            ->setScope($mockOptions['scope'])
            ->setMethod($mockOptions['method'])
            ->setUri($mockOptions['uri']);
        $processor = $this->getProcessor();

        $nested = $processor->process($annotation, $operation, $mockMeta);

        $this->assertEquals($operation, $operation2);
        $this->assertEquals($nested, array($request, $response));

    }

    public function testGetNestedAnnotations()
    {
        $request = new Describe\Request(array());
        $response = new Describe\Response(array());
        $annotation1 = new Describe\Operation(array(
            'request' => $request,
            'response' => $response,
        ));
        $annotation2 = new Describe\Operation(array());
        $processor = $this->getProcessor();

        $this->assertEquals(array($request, $response), $processor->getNestedAnnotations($annotation1));
        $this->assertEmpty($processor->getNestedAnnotations($annotation2));
    }

    protected function getProcessor()
    {
        $entityManager = $this
            ->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();

        return new DescribeOperationProcessor($entityManager);
    }
}

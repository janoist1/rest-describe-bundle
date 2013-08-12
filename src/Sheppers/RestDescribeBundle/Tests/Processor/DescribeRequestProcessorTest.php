<?php

namespace Sheppers\RestDescribeBundle\Tests\Processor;

use Sheppers\RestDescribeBundle\Annotation\Describe;
use Sheppers\RestDescribeBundle\Entity;
use Sheppers\RestDescribeBundle\Processor\DescribeRequestProcessor;
use Symfony\Component\Routing\Route;
use Doctrine\Common\Annotations\Reader as AnnotationReader;
use Doctrine\ORM\EntityManager;

class DescribeRequestProcessorTest extends \PHPUnit_Framework_TestCase
{
    public function testSupports()
    {
        $processor = $this->getProcessor();
        $resource = $this->getMock('Sheppers\RestDescribeBundle\Entity\Resource', array(), array('Test res'));
        $describeRequest = $this->getMock('Sheppers\RestDescribeBundle\Annotation\Describe\Request', array(), array(array()));
        $entityOperation = $this->getMock('Sheppers\RestDescribeBundle\Entity\Operation', array(), array('Test op', $resource));
        $describeProperty = $this->getMock('Sheppers\RestDescribeBundle\Annotation\Describe\Property', array(), array(array()));
        $entityProperty = $this->getMock('Sheppers\RestDescribeBundle\Entity\Property', array(), array('Test prop', $resource));

        $this->assertTrue($processor->supports($describeRequest, $entityOperation));
        $this->assertFalse($processor->supports($describeProperty, $entityProperty));
    }

    public function testProcess()
    {
        $processor = $this->getProcessor();
        $describeRequest = $this->getMock(
            'Sheppers\RestDescribeBundle\Annotation\Describe\Request',
            array('getModel', 'getParameters'),
            array(array()));
        $describeRequest
            ->expects($this->once())
            ->method('getModel')
            ->will($this->returnValue(null));
        $describeRequest
            ->expects($this->once())
            ->method('getParameters')
            ->will($this->returnValue(null));
        $resource = $this->getMock('Sheppers\RestDescribeBundle\Entity\Resource', array(), array('Test res'));
        $entityOperation = $this->getMock('Sheppers\RestDescribeBundle\Entity\Operation', array(), array('Test op', $resource));
        $route = $this
            ->getMockBuilder('Symfony\Component\Routing\Route')
            ->disableOriginalConstructor()
            ->setMethods(array('getMethods', 'getPath'))
            ->getMock();
        $route
            ->expects($this->once())
            ->method('getMethods')
            ->will($this->returnValue(array('POST')));
        $route
            ->expects($this->once())
            ->method('getPath')
            ->will($this->returnValue('/test/path'));
        $meta = array(
            'route' => $route
        );

        $processor->process($describeRequest, $entityOperation, $meta);
    }

    protected function getProcessor()
    {
        $entityManager = $this
            ->getMockBuilder('Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();
        $annotationReader = $this
            ->getMockBuilder('Doctrine\Common\Annotations\Reader')
            ->disableOriginalConstructor()
            ->getMock();

        return new DescribeRequestProcessor($entityManager, $annotationReader);
    }
}

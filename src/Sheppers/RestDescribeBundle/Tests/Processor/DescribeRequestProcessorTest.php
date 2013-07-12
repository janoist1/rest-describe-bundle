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
        $resource = new Entity\Resource('Test res');
        $describeRequest = new Describe\Request(array());
        $entityOperation = new Entity\Operation('Test op', $resource);
        $describeProperty = new Describe\Property(array());
        $entityProperty = new Entity\Property('Test prop', $resource);

        $this->assertTrue($processor->supports($describeRequest, $entityOperation));
        $this->assertFalse($processor->supports($describeProperty, $entityProperty));
    }

    public function testProcess()
    {

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

<?php
namespace MJanssen\Service;

use JMS\Serializer\SerializerBuilder;
use MJanssen\Assets\Entity\Test;

class HydratorServiceTest extends \PHPUnit_Framework_TestCase
{

    protected $testData = array('id' => 1, 'name' => 'foo');

    /**
     * Test hydrate single entity
     */
    public function testHydrateEntity()
    {
        $serializer = SerializerBuilder::create()->build();
        $service    = new HydratorService($serializer);

        $result = $service->hydrateEntity($this->testData, 'MJanssen\Assets\Entity\Test');

        $this->assertEquals(
            $this->createEntity($this->testData),
            $result
        );
    }

    /**
     * Create a mock entity
     * @param $args
     * @return Foo
     */
    protected function createEntity($args)
    {
        $entity = new Test;
        $entity->id = $args['id'];
        $entity->name = $args['name'];
        return $entity;
    }
}
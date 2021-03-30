<?php

namespace AdeptDigital\WpFramework\Tests\Component;

use AdeptDigital\WpBaseComponent\AbstractComponent;
use AdeptDigital\WpFramework\Component\ComponentAwareTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ComponentAwareTraitTest extends TestCase
{
    public function testSetGetComponent()
    {
        /** @var MockObject|ComponentAwareTrait $trait */
        $trait = $this->getMockForTrait(ComponentAwareTrait::class);
        $component = $this->getMockForAbstractClass(AbstractComponent::class, ['abc', 'test.php']);
        $trait->setComponent($component);

        $this->assertSame($component, $trait->getComponent());
    }
}
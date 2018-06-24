<?php
namespace Yireo\ExampleLayoutUpdates\Test\Integration\Block;

use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\AbstractController;
use Yireo\ExampleLayoutUpdates\Block\Example;

/**
 * Class ExampleTest
 *
 * @package Yireo\ExampleLayoutUpdates\Test\Integration\Block
 */
class ExampleTest extends AbstractController
{
    /**
     *
     */
    public function testBlockExistence()
    {
        $layout = $this->getLayout();

        /** @var Example $layoutExampleBlock */
        $layoutExampleBlock = $layout->createBlock(Example::class, 'exampleLayoutUpdates.example');
        $this->assertEquals(get_class($layoutExampleBlock), Example::class);
    }

    public function testBlockOutput()
    {
        $this->dispatch('/');

        /** @var \Magento\TestFramework\Response $response */
        $response = $this->getResponse();
        $body = $response->getBody();

        //$childNames = $this->getLayout()->getChildNames('before.body.end');
        //$this->assertContains('exampleLayoutUpdates.example', $childNames, var_export($childNames,true));

        $this->assertContains('Yireo_ExampleLayoutUpdates::example.phtml', $body);
        $this->assertContains('Yireo_ExampleLayoutUpdates::example/child.phtml', $body);
    }

    /**
     * @return LayoutInterface
     */
    private function getLayout(): LayoutInterface
    {
        $this->dispatch('/');
        return $this->getObjectManager()->create(LayoutInterface::class);
    }

    /**
     * @return ObjectManagerInterface
     */
    private function getObjectManager(): ObjectManagerInterface
    {
        return Bootstrap::getObjectManager();
    }
}

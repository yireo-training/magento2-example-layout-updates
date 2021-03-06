<?php

namespace Yireo\ExampleLayoutUpdates\Test\Integration\Block;

use Magento\Framework\ObjectManagerInterface;
//use Magento\Framework\App\ObjectManager;
use Magento\TestFramework\ObjectManager;
use Magento\Framework\View\LayoutInterface;
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
     * Test if the output of the Block can be generated
     */
    public function testBlockExistence()
    {
        $layout = $this->getLayout();

        /** @var Example $layoutExampleBlock */
        $layoutExampleBlock = $layout->createBlock(Example::class, 'example-layout-updates.example');

        $this->assertInstanceof(Example::class, $layoutExampleBlock);
    }

    /**
     * Test if the Blocks output appears when rendering the page
     */
    public function testBlockOutput()
    {
        $this->dispatch('/');

        /** @var \Magento\TestFramework\Response $response */
        $response = $this->getResponse();
        $body = $response->getBody();

        $this->assertContains('Yireo_ExampleLayoutUpdates::example.phtml', $body);
        $this->assertContains('Yireo_ExampleLayoutUpdates::example/child.phtml', $body);
    }

    /**
     * Test if the layout is working
     */
    public function testLayout()
    {
        $this->dispatch('/');

        $layout = $this->getLayout();

        $blockName = 'example-layout-updates.example';
        $this->assertArrayHasKey($blockName, $layout->getAllBlocks());

        $childNames = $layout->getChildNames('before.body.end');
        $this->assertContains($blockName, $childNames, var_export($childNames, true));

        /** @var Example $exampleBlock */
        $exampleBlock = $layout->getBlock($blockName);
        $childNames = $layout->getChildNames($exampleBlock->getNameInLayout());
        $this->assertContains($blockName.'.child', $childNames, var_export($childNames, true));
    }

    /**
     * @return LayoutInterface
     */
    private function getLayout(): LayoutInterface
    {
        return $this->getObjectManager()->get(LayoutInterface::class);
    }

    /**
     * @return ObjectManagerInterface
     */
    private function getObjectManager(): ObjectManagerInterface
    {
        return ObjectManager::getInstance();
    }
}

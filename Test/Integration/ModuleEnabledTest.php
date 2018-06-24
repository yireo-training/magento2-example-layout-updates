<?php
declare(strict_types=1);

namespace Yireo\ExampleLayoutUpdates\Test\Integration;

use Magento\Framework\Module\ModuleList;
use Magento\TestFramework\ObjectManager as TestObjectManager;
use Magento\Framework\App\ObjectManager;
use PHPUnit\Framework\TestCase;

class ModuleEnabledTest extends TestCase
{
    /**
     *
     */
    public function testIfModuleIsEnabled()
    {
        /** @var ModuleList $moduleList */
        $moduleList = $this->getObjectManager()->create(ModuleList::class);
        $this->assertContains('Yireo_ExampleLayoutUpdates', $moduleList->getNames(), var_export($moduleList->getNames(), true));
    }

    /**
     * @return ObjectManager
     */
    private function getObjectManager(): ObjectManager
    {
        return TestObjectManager::getInstance();
    }
}
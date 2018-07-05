# ExampleLayoutUpdates module for Magento 2
This module applies some example XML layout updates:
- Remove the newsletter subscribe block
- Replace it with a simple Text-block output (comment in HTML source)
- Add this all using a custom layout handle

## Installation
Install this module using composer:

    composer require yireo-training/magento2-example-layout-updates:dev-master

Enable this module:

    ./bin/magento module:enable Yireo_ExampleLayoutUpdates
    ./bin/magento setup:upgrade

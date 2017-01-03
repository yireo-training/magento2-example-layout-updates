# TestLayoutUpdates module for Magento 2
This module applies some example XML layout updates:
- Remove the newsletter subscribe block
- Replace it with a simple Text-block output (comment in HTML source)
- Add this all using a custom layout handle

## Installation
Install this module using composer:

    composer require yireo/test-layout-updates

Enable this module:

    ./bin/magento module:enable Yireo_TestLayoutUpdates
    ./bin/magento setup:upgrade
# Adding Block and Layout to controller action

1) First, we need to tell Magento to render the content using our own current webshop layout. Replace the contents of `Controller/Hello/World.php` with the following content:

```php
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class World extends \Magento\Framework\App\Action\Action {

    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $page_object = $this->pageFactory->create();
        return $page_object;
    }

}
```

2) Now, we want to specify how to render our specific route/page/controller. Begin by creating the directories `view\frontend\layout`. There, add a file called `tutorial_hello_world` (`tutorial` is the frontname and the rest is the location of your controller class):
```xml
<?xml version="1.0"?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="1column" xsi:noNamespaceSchemaLocation="../../../../../../../lib/internal/Magento/Framework/View/Layout/etc/page_configuration.xsd">
    <referenceBlock name="content">
        <block
            template="content.phtml"
            class="Oskarlind\Tutorial\Block\Main"
            name="oskarlind_tutorial_hello_world"/>
    </referenceBlock>
</page>
```

3) Then, add the template file we should use to render the block. Create folder `view\frontend\templates` and add the file `content.php` (the one we specified in the layout xml file above):
```php
<h1><?php echo $this->getMessage(); ?></h1>
```

4) We are still missing the Block class! Create the folder Block under the module root directory. There, add the file Main.php:
```php
<?php

namespace Oskarlind\Tutorial\Block;

use Magento\Framework\View\Element\Template;

class Main extends Template {

    protected function _prepareLayout()
    {

    }

    public function getMessage() {
        return "Hello from Block class!";
    }

}
```

5) Flush the cache (`php magento cache:clean` or through admin), and remove your vendor directory from `/var/generation` (i.e. `Oskarlind`). The `var/generation` directory contains pre-generated php-classes, so they need to be refreshed. 

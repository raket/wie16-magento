#Create a plugin

Magento plugins are a great way of changing the functionality of a particular method. It can be used to intercept and modify incoming data, modify the return data, or simply prevent execution of the method in favour of your plugin. 

Plugins can intercept a method before, after or around its execution. For more information, see the official documentation: http://devdocs.magento.com/guides/v2.0/extension-dev-guide/plugins.html

Creating a plugin involves three steps: 
1) Locate the class/method to intercept
2) Declare your plugin through xml
3) Create the plugin class.

###Locate the class/method to intercept
Let's say you want to write a message in the Magento log whenever a review is added to your site. Review posts is handled by the class `\Magento\Review\Controller\Product\Post` (physical file is located in `/vendor/magento/module-review/Controller/Product/Post.php`). The class contains an `execute()` method, which is the one we want to intercept:
```php
...
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if (!$this->formKeyValidator->validate($this->getRequest())) {
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
...
```
This means we can safely grab the class path `\Magento\Review\Controller\Product\Post` and use it for reference when we declare our plugin in the next step.
###Declare your plugin through xml
Create the file `/etc/di.xml`. Then, declare your plugin:
```xml
<?xml version="1.0"?>
<!-- /etc/di.xml -->
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:ObjectManager/etc/config.xsd">
    <type name="\Magento\Review\Controller\Product\Post">
        <plugin
                name="oskarlind_tutorial_review_plugin"
                type="\Oskarlind\Tutorial\Model\ReviewPlugin"
                sortOrder="1"
                disabled="false"/>
    </type>
</config>
```
As seen above, the parameters are:
- Name: an arbitrary name of your plugin
- Type: The class path to your plugin (which we haven't created yet)
- SortOrder: The order in which plugins that call on the same method should run
- Disabled: Set it to false to enable the plugin

That's it! Time to create the actual plugin.

###Create the plugin class
Create the file `/Model/ReviewPlugin.php` with the following contents:
```php
namespace Oskarlind\Tutorial\Model;

class ReviewPlugin {

    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterExecute(\Magento\Review\Controller\Product\Post $subject, $result)
    {
        $this->logger->info("A review was added! Please go to Magento admin to approve/disapprove.");
        return $result;
    }

}
```
If you're not familiar with dependency injection, the short version is that by calling `\Psr\Log\LoggerInterface $logger` in our  `__construct` method, we're telling Magento to provide us with an instance of the logger class. We then save that instance to our `protected $logger` variable. 

After that, we declare our `afterExecute` method, using `\Magento\Review\Controller\Product\Post $subject` and `$result` as parameters. The `$subject` variable is interchangeable to the variable `$this` in `\Magento\Review\Controller\Product\Post`. The `$result` variable is what we would use to affect what's returned from the method.

In our `afterExecute` method, we use the logger object to log a message. Since we use the `info` logging level in this case, the message will be written to `/var/log/system.log.`

### Summary
Refresh the cache and enter a review on one of your products. The message should now be visible at the bottom of the log file:
```text
[2016-06-13 22:14:21] main.INFO: A review was added! Please go to your admin page to approve or disapprove it.
```

The complete module can be found here: https://github.com/oskarlind/wie15-magento/tree/master/Backend/Tutorial

Also, check out Alan's great tutorial on plugins here: http://alanstorm.com/magento_2_object_manager_plugin_system

Happy coding!

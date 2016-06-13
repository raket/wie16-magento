#Create an empty Magento 2 module

1) Create your module directory under `/app/code/<Vendor>/<ModuleName>`, for example `Oskarlind/Tutorial`

2) In your module, create the folder `etc`

3) In etc, create the file `module.xml` with the following contents (replace `Oskarlind_Tutorial` with your own Vendor/Module name):

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="../../../../../lib/internal/Magento/Framework/Module/etc/module.xsd">
    <module name="Oskarlind_Tutorial" setup_version="0.0.1" />
</config>
```

4) In your module folder, create the file `registration.php` with the following contents (replace `Oskarlind_Tutorial` with your own Vendor/Module name):
```php
<?php
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::MODULE,
    'Oskarlind_Tutorial',
    __DIR__
);
```

5) Now it's time to activate your module. If you use the command line interface you can type `php magento module:enable Oskarlind_Tutorial`. Otherwise, open `app/etc/config.php` and add your module to the bottom of the file. For example:
```php
...
    'Magento_Webapi' => 1,
    'Magento_WebapiSecurity' => 1,
    'Magento_Weee' => 1,
    'Magento_CatalogWidget' => 1,
    'Magento_Wishlist' => 1,
    'Oskarlind_Tutorial' => 1,
  ),
);
```
6) Finally, you need to run `php magento setup:upgrade` to upgrade the Magento application and db for the new module.
```php
php magento setup:upgrade
```

That's it! In magento admin, go to `Stores -> Configuration -> Advanced -> Advanced` to see your new module. If it's there, it means that Magento has detected it and you're ready to do some coding.

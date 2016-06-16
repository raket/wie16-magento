#Install a language pack in Magento 2
This is a complete guide on how to install a language pack in Magento 2. There are two ways to install a language pack:

* Installation through composer
* Download zip file

A language pack is technically a Magento component, so we need to install it as such. A language pack consists of:

* registration.php
* language.xml
* translation files (.csv)

If you install the language pack through zip download, we need to take into accound the vendor name when we create the directories. More on that later.

##Installation through composer

1. Start by locating the language pack, right now a few are listed on https://www.magentocommerce.com/magento-connect/magento-2. For example, the French language pack can be reached at https://github.com/Imaginaerum/magento2-language-fr-fr. 
2. From there, locate the composer key, for example `imaginaerum/magento2-language-fr-fr`. In the terminal, enter `composer require imaginaerum/magento2-language-fr-fr:*`.
3. Clean the cache (`php bin/magento cache:clean`).

##Installation through zip file
The process for installing through a zip file may vary depending on the language pack, but in general, it involves the following steps:

1. Create a new directory for the language pack in your Magento installation, for example `/app/i18n/imaginaerum/fr_fr` (`i18n` stands for "<a href="https://en.wikipedia.org/wiki/Internationalization_and_localization">internationalization</a>").
2. Extract the language pack into that directory.
3. Clean the cache (`php bin/magento cache:clean`).

##Activation
To activate the new language, go to Admin: Stores -> Configuration -> General -> Locale options -> Locale and choose select it in the drop down. Remember to switch to a certain store view first if your intention is to use different languages per store view.

Your new language should now be visible on the site.

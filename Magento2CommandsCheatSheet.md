#Magento 2 command line "Cheat sheet"
Listed below are a few of the most frequently used Magento 2 <a href="https://en.wikipedia.org/wiki/Command-line_interface">CLI</a> commands. This is not a complete reference (yet) and should be treated as a work-in-progress. Comments and improvement suggestions are welcome!

|Command|Decscription|Example|
|----|----|----|
|`cache:clean`|Cleans the cache. Your might also need to <a href="http://devdocs.magento.com/guides/v2.0/howdoi/php/php_clear-dirs.html">clear some directories</a> for changes to show.|`php magento cache:clean`|
|`deploy:mode:set`|Set Magento mode. For development, it should be set to `developer`. See the documentation <a href="http://devdocs.magento.com/guides/v2.0/config-guide/bootstrap/magento-modes.html">here</a>.|`php magento deploy:mode:set developer`|
|`deploy:mode:show`|Displays current application mode, for example `default`, `developer` or `production`|`php magento deploy:mode:show`|
|`indexer:reindex`|Reindex everything. Required after for example after applying shopping cart rules.|`php magento indexer:reindex`|

You need to run these commands from the `/bin` directory of your installation. For example, if you run Wamp (PC/Windows) you need to:

1. Open a new terminal window (run `cmd`)
2. Go to your Magento directory (type for example `cd c:\wamp\www\magento2\bin` depending on where your Magento installation lives)
3. Finished! Start typing in some commands.

If you run Mac:

1. Open the terminal application
2. Open Finder and navigate to your Magento `bin` directory.
3. Type `cd ` in the terminal and "drag" the `bin` folder from Finder to the terminal window. Press enter.
4. Now you've successfully navigated to your `bin` directory of your Magento installation and can start typing in commands.

Happy coding
/Oskar

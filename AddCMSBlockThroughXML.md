#Insert a CMS block through XML
1) In admin, create your CMS block through Content -> Blocks. Insert a title, an identifier (for example `contact_us`) and some content. Note that we will use the identifier to add the block later, so make note of it.

2) In your theme, create a file `/Magento_Theme/layout/default.xml`. We will now try to add our `contact_us` block to the `footer` container. Add the following content to the file:
```xml
<?xml version="1.0"?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" layout="1column" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <body>
        <referenceContainer name="footer">
            <block class="Magento\Cms\Block\Block" name="contactUs">
                <arguments>
                    <argument name="block_id" xsi:type="string">contact_us</argument>
                </arguments>
            </block>
        </referenceContainer>
    </body>
</page>
```
Please note that the XML is very sensitive to spaces, so make sure there are no extra such spaces in the file, for example before/after the tags (`<` and `>`).

3) Now all that's left is to refresh the cache (through Admin -> System -> Cache management or the cli, `php magento cache:clean`).

4) Refresh the page. The block should now appear in the footer.

Happy coding!
/Oskar

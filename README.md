![](https://github.com/phpro/phpro-mage2-module-bypass-page-cache/workflows/.github/workflows/grumphp.yml/badge.svg)

# Bypass Page Cache for Magento 2

This module will allow you to bypass the full page cache by adding a specific header to the request.

## Installation

`composer require phpro/mage2-module-bypass-page-cache`

## Key features

### Configuration

To use this feature, you have to activate it in the backend 
`Stores > Configuration > Advanced > System > Full Page Cache > Enable Full Page Cache Bypass`

This setting is only available when you use the Built-in Cache. This feature is not relevant when you use Varnish. 

Note: this is meant to be used on development and staging environments. Make sure this is disabled in production. 

### Blackfire

This module was built to be used with Blackfire.

When creating profiles in Blackfire, you need to be able to bypass the full page cache. Magento 2 does not provide an
easy way to bypass the full page cache, so we created this module. 

Blackfire adds the header `X-Blackfire-Query` when profiling over HTTP. When this header exists your request, the full
page cache will be ignored.

### Custom header

The module is created to work with the Blackfire header by default. If you want to use this feature, but need a 
different header, you can override the default configuration.

Add the following in the file `config.xml` of a project module.

    <default>
        <system>
            <full_page_cache>
                <bypass_header>My-Custom-Header</bypass_header>
            </full_page_cache>
        </system>
    </default>

<?php

namespace Phpro\BypassPageCache\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Phpro\BypassPageCache\Api\SystemConfigurationInterface;

/**
 * Class SystemConfiguration
 * @package Phpro\BypassPageCache\Config
 */
class SystemConfiguration implements SystemConfigurationInterface
{
    const XML_CACHE_BYPASS_ENABLED = 'system/full_page_cache/bypass_enabled';

    const XML_HTTP_HEADER = 'system/full_page_cache/bypass_header';

    /**
     * @var ScopeConfigInterface
     */
    private $config;

    /**
     * @param ScopeConfigInterface $config
     */
    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @return bool
     */
    public function isPageCacheBypassEnabled()
    {
        return $this->config->getValue(self::XML_CACHE_BYPASS_ENABLED);
    }

    /**
     * @return string
     */
    public function getHttpHeader()
    {
        return $this->config->getValue(self::XML_HTTP_HEADER);
    }
}

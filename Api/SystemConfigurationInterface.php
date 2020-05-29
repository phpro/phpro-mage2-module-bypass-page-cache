<?php

namespace Phpro\BypassPageCache\Api;

/**
 * Interface SystemConfigurationInterface
 * @package Phpro\BypassPageCache\Api
 */
interface SystemConfigurationInterface
{
    /**
     * @return bool
     */
    public function isPageCacheBypassEnabled();

    /**
     * @return string
     */
    public function getHttpHeader();
}

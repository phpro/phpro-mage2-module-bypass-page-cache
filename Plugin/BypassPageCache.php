<?php

namespace Phpro\BypassPageCache\Plugin;

use Magento\Framework\App\PageCache\Kernel;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\App\Response\Http as HttpResponse;
use Phpro\BypassPageCache\Api\SystemConfigurationInterface;
use Zend\Http\Header\HeaderInterface;

/**
 * Class BypassPageCache
 * @package Phpro\BypassPageCache\Plugin
 */
class BypassPageCache
{
    /**
     * @var HttpRequest
     */
    private $request;

    /**
     * @var SystemConfigurationInterface
     */
    private $configuration;

    /**
     * @param HttpRequest $request
     * @param SystemConfigurationInterface $configuration
     */
    public function __construct(HttpRequest $request, SystemConfigurationInterface $configuration)
    {
        $this->request = $request;
        $this->configuration = $configuration;
    }

    /**
     * This plugin allows to bypass the full page cache when a specific header is present in the request
     *
     * @param Kernel $subject
     * @param \Closure $proceed
     * @return HttpResponse|false
     */
    public function aroundLoad(Kernel $subject, \Closure $proceed)
    {
        if ($this->skipLoadFromCache()) {
            return false;
        }

        return $proceed();
    }

    /**
     * Checks if bypass is enabled and a specific header is present in the request
     *
     * @return bool|HeaderInterface
     */
    private function skipLoadFromCache()
    {
        if (!$this->configuration->isPageCacheBypassEnabled()) {
            return false;
        }

        return $this->request->getHeader($this->configuration->getHttpHeader());
    }
}

<?php

namespace BzoTech\Categories\Helper;

use Magento\Store\Model\StoreManagerInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\View\LayoutInterface
     */
    protected $layout;
    protected $moduleManager;
    protected $_storeManager;

    public function __construct(
        StoreManagerInterface $storeManagerInterface,
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Framework\App\Helper\Context $context
    )
    {
        $this->moduleManager = $moduleManager;
        $this->_storeManager = $storeManagerInterface;
        parent::__construct($context);
    }

    /**
     * @return int
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */

    public function getStoreId()
    {
        return $this->_storeManager->getStore()->getId();
    }

    /**
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */

    public function getUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    /**
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */

    public function getMediaUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }

    /**
     * @param $name
     * @param null $storeCode
     * @return mixed
     */

    public function getCategoriesConfig($name, $storeCode = null)
    {
        return $this->scopeConfig->getValue(
            'categories/' . $name,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeCode
        );
    }

    /**
     * @param $catId
     * @return mixed
     */
    public function getCategory($catId)
    {
        $objectManager   = \Magento\Framework\App\ObjectManager::getInstance();
        $categoryFactory = $objectManager->create('\Magento\Catalog\Model\CategoryFactory');
        $cate            = $categoryFactory->create()->load((int)$catId);
        return $cate;
    }

    public function getCategoryImage($catId)
    {
        $subCatImage = $this->getCategory($catId)->getBzotechCategoryImage();
        if ($subCatImage) {
            $arr     = explode('/media/', $subCatImage);
            $imgPath = $this->getMediaUrl() . $arr[1];
        } else {
            $imgPath = $this->getMediaUrl() . 'bzotech_categories/no-photo.jpg';
        }
        return $imgPath;
    }
}
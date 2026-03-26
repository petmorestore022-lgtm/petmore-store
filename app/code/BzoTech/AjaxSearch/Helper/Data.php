<?php
/**
 * @category BZOTech
 * @package BzoTech_AjaxSearch
 * @version 1.0.0
 * @copyright Copyright (c) 2022 BZOTech Company. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * @author BZOTech Company <contact@bzotech.com>
 * @link https://bzotech.com
 */

namespace BzoTech\AjaxSearch\Helper;

use Magento\Store\Model\StoreManagerInterface;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\View\LayoutInterface
     */
    protected $layout;
    protected $_storeManager;
    private $_objectManager;

    public function __construct(
        StoreManagerInterface $storeManagerInterface,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\App\Helper\Context $context
    )
    {
        $this->_storeManager  = $storeManagerInterface;
        $this->_objectManager = $objectManager;
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

    public function getAjaxSearchConfig($name, $storeCode = null)
    {
        return $this->scopeConfig->getValue(
            'ajaxsearch/' . $name,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeCode
        );
    }
}
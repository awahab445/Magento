<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magentocommerce.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Checkout
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/**
 * Multishipping checkout select billing address
 *
 * @category   Mage
 * @package    Mage_Checkout
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Checkout_Block_Multishipping_Address_Select extends Mage_Checkout_Block_Multishipping_Abstract
{
    protected function _prepareLayout()
    {
        if ($headBlock = $this->getLayout()->getBlock('head')) {
            $headBlock->setTitle(Mage::helper('checkout')->__('Change Billing Address') . ' - ' . $headBlock->getDefaultTitle());
        }
        return parent::_prepareLayout();
    }
    
    protected function _getCheckout()
    {
        return Mage::getSingleton('checkout/type_multishipping');
    }
    
    public function getAddressCollection()
    {
        $collection = $this->getData('address_collection');
        if (is_null($collection)) {
            $collection = $this->_getCheckout()->getCustomer()->getAddresses();
            $this->setData('address_collection', $collection);
        }
        return $collection;
    }
    
    public function isAddressDefaultBilling($address)
    {
        return $address->getId() == $this->_getCheckout()->getCustomer()->getDefaultBilling();
    }
    
    public function isAddressDefaultShipping($address)
    {
        return $address->getId() == $this->_getCheckout()->getCustomer()->getDefaultShipping();
    }
    
    public function getEditAddressUrl($address)
    {
        return $this->getUrl('*/*/editAddress', array('id'=>$address->getId()));
    }
    
    public function getSetAddressUrl($address)
    {
        return $this->getUrl('*/*/setBilling', array('id'=>$address->getId()));
    }
    
    public function getAddNewUrl()
    {
        return $this->getUrl('*/*/newBilling');
    }
    
    public function getBackUrl()
    {
        return $this->getUrl('*/multishipping/billing');
    }
}
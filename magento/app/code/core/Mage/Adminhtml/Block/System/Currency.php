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
 * @package     Mage_Adminhtml
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */


/**
 * Manage currency block
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Block_System_Currency extends Mage_Adminhtml_Block_Template
{

    protected function _construct()
    {
        $this->setTemplate('system/currency/rates.phtml');
    }

    protected function _prepareLayout()
    {
        $this->setChild('save_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('adminhtml')->__('Save Currency Rates'),
                    'onclick'   => 'currencyForm.submit();',
                    'class'     => 'save'
        )));

        $this->setChild('reset_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('adminhtml')->__('Reset'),
                    'onclick'   => 'document.location.reload()',
                    'class'     => 'reset'
        )));

        $this->setChild('import_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('adminhtml')->__('Import'),
                    'class'     => 'add',
                    'type'      => 'submit',
        )));

        $this->setChild('rates_matrix',
            $this->getLayout()->createBlock('adminhtml/system_currency_rate_matrix')
        );

        $this->setChild('import_services',
            $this->getLayout()->createBlock('adminhtml/system_currency_rate_services')
        );

        return parent::_prepareLayout();
    }

    protected function getHeader()
    {
        return Mage::helper('adminhtml')->__('Manage Currency Rates');
    }

    protected function getSaveButtonHtml()
    {
        return $this->getChildHtml('save_button');
    }

    protected function getResetButtonHtml()
    {
        return $this->getChildHtml('reset_button');
    }

    protected function getImportButtonHtml()
    {
        return $this->getChildHtml('import_button');
    }

    protected function getServicesHtml()
    {
        return $this->getChildHtml('import_services');
    }

    protected function getRatesMatrixHtml()
    {
        return $this->getChildHtml('rates_matrix');
    }

    protected function getImportFormAction()
    {
        return $this->getUrl('*/*/fetchRates');
    }

}

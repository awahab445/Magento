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
 * @package     Mage_Sales
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */

/**
 * Flat sales order creditmemo grid collection
 *
 */
class Mage_Sales_Model_Mysql4_Order_Creditmemo_Grid_Collection extends Mage_Sales_Model_Mysql4_Order_Creditmemo_Collection
{
    protected $_eventPrefix = 'sales_order_creditmemo_grid_collection';
    protected $_eventObject = 'order_creditmemo_grid_collection';

    protected function _construct()
    {
        parent::_construct();
        $this->setMainTable('sales/creditmemo_grid');
    }
}

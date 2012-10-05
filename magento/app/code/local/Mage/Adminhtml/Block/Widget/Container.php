<?php
/**
 * Adminhtml container block
 *
 * Extended: To add a simple event that we can use to add, update or remove buttons to the widget container.
 *
 * @category    Mage
 * @package     Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Mage_Adminhtml_Block_Widget_Container extends Mage_Adminhtml_Block_Template
{

    /**
     * So called "container controller" to specify group of blocks participating in some action
     *
     * @var string
     */
    protected $_controller = 'empty';

    /**
     * Array of buttons
     *
     *
     * @var array
     */
    protected $_buttons = array(
        -1  => array(),
        0   => array(),
        1   => array(),
    );

    /**
     * Header text
     *
     * @var string
     */
    protected $_headerText = 'Container Widget Header';

    /**
     * Add a button
     *
     * @param string $id
     * @param array $data
     * @param integer $level
     * @param integer $sortOrder
     * @param string|null $placement area, that button should be displayed in ('header', 'footer', null)
     * @return Mage_Adminhtml_Block_Widget_Container
     */
    protected function _addButton($id, $data, $level = 0, $sortOrder = 100, $area = 'header')
    {
        if (!isset($this->_buttons[$level])) {
            $this->_buttons[$level] = array();
        }
        $this->_buttons[$level][$id] = $data;
        $this->_buttons[$level][$id]['area'] = $area;
        return $this;
    }

    /**
     * Public wrapper for protected _addButton method
     *
     * @param string $id
     * @param array $data
     * @param integer $level
     * @param integer $sortOrder
     * @param string|null $placement area, that button should be displayed in ('header', 'footer', null)
     * @return Mage_Adminhtml_Block_Widget_Container
     */
    public function addButton($id, $data, $level = 0, $sortOrder = 100, $area = 'header')
    {
        return $this->_addButton($id, $data, $level, $sortOrder, $area);
    }

    /**
     * Remove existing button
     *
     * @param string $id
     * @return Mage_Adminhtml_Block_Widget_Container
     */
    protected function _removeButton($id)
    {
        foreach ($this->_buttons as $level => $buttons) {
            if (isset($buttons[$id])) {
                unset($this->_buttons[$level][$id]);
            }
        }
        return $this;
    }

    /**
     * Public wrapper for the _removeButton() method
     *
     * @param string $id
     * @return Mage_Adminhtml_Block_Widget_Container
     */
    public function removeButton($id)
    {
        return $this->_removeButton($id);
    }

    /**
     * Update specified button property
     *
     * @param string $id
     * @param string|null $key
     * @param mixed $data
     * @return Mage_Adminhtml_Block_Widget_Container
     */
    protected function _updateButton($id, $key=null, $data)
    {
        foreach ($this->_buttons as $level => $buttons) {
            if (isset($buttons[$id])) {
                if (!empty($key)) {
                    if ($child = $this->getChild($id . '_button')) {
                        $child->setData($key, $data);
                    }
                    if ('level' == $key) {
                        $this->_buttons[$data][$id] = $this->_buttons[$level][$id];
                        unset($this->_buttons[$level][$id]);
                    } else {
                        $this->_buttons[$level][$id][$key] = $data;
                    }
                } else {
                    $this->_buttons[$level][$id] = $data;
                }
                break;
            }
        }
        return $this;
    }

    /**
     * Public wrapper for protected _updateButton method
     *
     * @param string $id
     * @param string|null $key
     * @param mixed $data
     * @return Mage_Adminhtml_Block_Widget_Container
     */
    public function updateButton($id, $key=null, $data)
    {
        return $this->_updateButton($id, $key, $data);
    }

    /**
     * Preparing child blocks for each added button
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _prepareLayout()
    {
        foreach ($this->_buttons as $level => $buttons) {
            foreach ($buttons as $id => $data) {
                $childId = $this->_prepareButtonBlockId($id);
                $this->_addButtonChildBlock($childId);
            }
        }
        return parent::_prepareLayout();
    }

    /**
     * Prepare block id for button's id
     *
     * @param string $id
     * @return string
     */
    protected function _prepareButtonBlockId($id)
    {
        return $id . '_button';
    }

    /**
     * Adding child block with specified child's id.
     *
     * @param string $childId
     * @return Mage_Adminhtml_Block_Widget_Button
     */
    protected function _addButtonChildBlock($childId)
    {
        $block = $this->getLayout()->createBlock('adminhtml/widget_button');
        $this->setChild($childId, $block);
        return $block;
    }

    /**
     * Produce buttons HTML
     *
     * @param string $area
     * @return string
     */
    public function getButtonsHtml($area = null)
    {
        $out = '';
        foreach ($this->_buttons as $level => $buttons) {
            foreach ($buttons as $id => $data) {
                if ($area && isset($data['area']) && ($area != $data['area'])) {
                    continue;
                }
                $childId = $this->_prepareButtonBlockId($id);
                $child = $this->getChild($childId);

                if (!$child) {
                    $child = $this->_addButtonChildBlock($childId);
                }
                if (isset($data['name'])) {
                    $data['element_name'] = $data['name'];
                }
                $child->setData($data);

                $out .= $this->getChildHtml($childId);
            }
        }
        return $out;
    }

    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        return $this->_headerText;
    }

    /**
     * Get header CSS class
     *
     * @return string
     */
    public function getHeaderCssClass()
    {
        return 'head-' . strtr($this->_controller, '_', '-');
    }

    /**
     * Get header HTML
     *
     * @return string
     */
    public function getHeaderHtml()
    {
        return '<h3 class="' . $this->getHeaderCssClass() . '">' . $this->getHeaderText() . '</h3>';
    }

    /**
     * Check if there's anything to display in footer
     *
     * @return boolean
     */
    public function hasFooterButtons()
    {
        foreach ($this->_buttons as $level => $buttons) {
            foreach ($buttons as $id => $data) {
                if (isset($data['area']) && ('footer' == $data['area'])) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Prepare html output
     *
     * @return string
     */
    protected function _toHtml()
    {
    	// Added to trigger an event that has the type name of the container in it.
    	$type = substr(strrchr($this->getType(), '/'), 1);
    	Mage::dispatchEvent('adminhtml_widget_container_html_before_' . $type, array('block' => $this));

        Mage::dispatchEvent('adminhtml_widget_container_html_before', array('block' => $this));
        return parent::_toHtml();
    }
}

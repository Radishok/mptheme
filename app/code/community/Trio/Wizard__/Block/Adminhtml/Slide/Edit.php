<?php
/**
 * @category	Trio
 * @package		wizard
 */

class Trio_Wizard_Block_Adminhtml_Slide_Edit  extends Mage_Adminhtml_Block_Widget_Form_Container {

	public function __construct() {
		parent::__construct();

		$this->_objectId	= 'id';
		$this->_controller	= 'adminhtml_slide';
		$this->_blockGroup	= 'wizard';

		$this->_addButton('saveandcontinue', array(
			'label'		=> Mage::helper('adminhtml')->__('Save And Continue Edit'),
			'onclick'	=> 'saveAndContinueEdit()',
			'class'		=> 'save',
		), -100);

		$this->_formScripts[] = "
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
	}

	public function getHeaderText() {
		if(Mage::registry('wizard_slide')) {
			return Mage::helper('wizard')->__("Edit Slide '%s'", $this->htmlEscape(Mage::registry('wizard_slide')->getTitle()));
		} else {
			return Mage::helper('wizard')->__("Add Slide");
		}
	}

	protected function _prepareLayout() {
		parent::_prepareLayout();
		if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
			$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
		}
	}
}
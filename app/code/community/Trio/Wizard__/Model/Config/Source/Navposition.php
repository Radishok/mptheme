<?php
/**
 * @category	Trio
 * @package		Wizard
 */

class Trio_Wizard_Model_Config_Source_Navposition {

	/**
	 * Retrieve an array of possible options
	 *
	 * @return array
	 */
	public function toOptionArray($includeEmpty = false, $emptyText = '-- Please Select --') {
		$options = array();

		if ($includeEmpty) {
			$options[] = array(
				'value' => '',
				'label' => Mage::helper('adminhtml')->__($emptyText),
			);
		}

		foreach($this->getOptions() as $value => $label) {
			$options[] = array(
				'value' => $value,
				'label' => Mage::helper('adminhtml')->__($label),
			);
		}

		return $options;
	}

	/**
	 * Retrieve an array of possible options
	 *
	 * @return array
	 */
	public function getOptions() {
		return array(
			'inside' 			=> 'Inside slider on both sides',
			'outside' 			=> 'Outside the slider on both sides',
			'inside-left' 		=> 'Inside slider grouped left',
			'inside-right' 		=> 'Inside slider grouped right',
		);
	}
}
<?php
/*------------------------------------------------------------------------
# BzoTech ThemeCore - Version 1.0.0
# Copyright (c) 2016 BzoTech Company. All Rights Reserved.
# @license - Copyrighted Commercial Software
# Author: BzoTech Company
# Websites: https://bzotech.com
-------------------------------------------------------------------------*/

namespace BzoTech\ThemeCore\Model\Config\Source;

class ListBgPosition implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return [
			['value' => 'left top', 'label' => __('Left Top')],
			['value' => 'left center', 'label' => __('Left Center')],
			['value' => 'left bottom', 'label' => __('Left Bottom')],
			['value' => 'right top', 'label' => __('Right Top')],
			['value' => 'right center', 'label' => __('Right Center')],
			['value' => 'right bottom', 'label' => __('Right Bottom')],
			['value' => 'center top', 'label' => __('Center Top')],
			['value' => 'center center', 'label' => __('Center Center')],
			['value' => 'center bottom', 'label' => __('Center Bottom')],			
		];
	}
}

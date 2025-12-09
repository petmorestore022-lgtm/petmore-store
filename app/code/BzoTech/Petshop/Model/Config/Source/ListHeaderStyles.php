<?php

namespace BzoTech\Petshop\Model\Config\Source;

class ListHeaderStyles implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'header-1', 'label' => __('Header Style 1')],
        ];
    }
}
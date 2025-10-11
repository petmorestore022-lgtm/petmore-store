<?php

namespace Vendor\DisableCSP\Plugin;

class DisableCspPlugin
{
    public function afterConfigure(\Magento\Csp\Model\Mode\ConfigManager $subject, $result)
    {
        return false;
    }
}

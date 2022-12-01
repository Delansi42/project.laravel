<?php
namespace Package2;

use donatj\UserAgent\UserAgentParser as VendorUserAgentParser;
use Package1\UserAgentInterface;

class UserAgentParser implements UserAgentInterface
{
    protected $_data;

    public function parse($userAgent)
    {
        $parser = new VendorUserAgentParser();
        $this->_data = $parser->parse();
    }

    public function getBrowser(): string
    {
        return $this->_data->browser();
    }

    public function getOperatingSystem(): string
    {
        return $this->_data->platform();
    }
}

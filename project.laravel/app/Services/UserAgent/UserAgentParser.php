<?php
namespace App\Services\UserAgent;

use donatj\UserAgent\UserAgentParser as VendorUserAgentParser;

class UserAgentParser implements UserAgentInterface
{
    protected $_data;

    public function parse()
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

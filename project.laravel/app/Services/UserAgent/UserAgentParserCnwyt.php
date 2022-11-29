<?php
namespace App\Services\UserAgent;

use Cnwyt\UserAgentParser\UserAgentParser as CnwytParser;

class UserAgentParserCnwyt implements UserAgentInterface
{
    protected $_data;

    public function parse($userAgent)
    {
        $parser = new CnwytParser();
        $parser->setUserAgent($userAgent);
        $this->_data = $parser;
    }

    public function getBrowser(): string
    {
        return $this->_data->getBrowserName();
    }

    public function getOperatingSystem(): string
    {
        return $this->_data->getSystemName();
    }
}

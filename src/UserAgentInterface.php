<?php
namespace Package1;

interface UserAgentInterface
{
    public function parse($userAgent);

    public function getBrowser(): string;

    public function getOperatingSystem(): string;
}

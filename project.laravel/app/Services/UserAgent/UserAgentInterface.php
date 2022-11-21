<?php
namespace App\Services\UserAgent;

interface UserAgentInterface
{
    public function parse();

    public function getBrowser(): string;

    public function getOperatingSystem(): string;
}

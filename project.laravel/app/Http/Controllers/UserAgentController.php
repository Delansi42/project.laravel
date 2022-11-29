<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Services\UserAgent\UserAgentInterface;

class UserAgentController
{
    public function index(UserAgentInterface $reader)
    {
        $reader->parse(request()->userAgent());
        $browser = $reader->getBrowser();
        $operatingSystem = $reader->getOperatingSystem();
        if (!empty($browser) && !empty($operatingSystem)) {
            Visit::create([
                'browser' => $browser,
                'operating_system' => $operatingSystem,
            ]);
        }
    }
}

<?php

namespace App\Providers;

use OwenIt\Auditing\Auditor;
use App\AuditDrivers\SyslogDriver;
use \OwenIt\Auditing\AuditingServiceProvider;

class AuditServiceProvider extends AuditingServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \OwenIt\Auditing\Contracts\Auditor::class,
            function ($app) {
                $auditor = new Auditor($app);
                $auditor->extend(
                    'syslog',
                    function () {
                        return new SyslogDriver();
                    }
                );
                return $auditor;
            }
        );
    }
}

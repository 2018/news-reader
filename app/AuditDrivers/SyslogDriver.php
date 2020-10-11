<?php

namespace App\AuditDrivers;

use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Contracts\AuditDriver;

class SyslogDriver implements AuditDriver
{
    /**
     * Perform an audit.
     *
     * @param \OwenIt\Auditing\Contracts\Auditable $model Auditable model
     *
     * @return \OwenIt\Auditing\Models\Audit
     *
     * @throws \OwenIt\Auditing\Exceptions\AuditingException
     */
    public function audit(Auditable $model): Audit
    {
        syslog(LOG_INFO, json_encode($model->toAudit()));
        return resolve('\OwenIt\Auditing\Models\Audit');
    }

    /**
     * Remove older audits that go over the threshold.
     *
     * @param \OwenIt\Auditing\Contracts\Auditable $model Auditable model
     *
     * @return bool
     */
    public function prune(Auditable $model): bool
    {
        unset($model);
        return false;
    }
}

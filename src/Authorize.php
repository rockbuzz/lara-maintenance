<?php

namespace Rockbuzz\LaraMaintenance;

class Authorize
{
    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        if ($this->isMaintenanceMode($this->getClientIp($request))) {
            abort(503);
        }
        return $next($request);
    }

    private function isMaintenanceMode(string $clientIp): bool
    {
        if (config('maintenance.mode') and ! in_array($clientIp, $this->getExceptIps())) {
            return true;
        }
        return false;
    }

    private function getExceptIps(): array
    {
        return $this->takeOutSpaces(
            explode(',', config('maintenance.except'))
        );
    }

    private function takeOutSpaces(array $ips)
    {
        return array_map(function ($ip) {
            return trim($ip);
        }, $ips);
    }

    private function getClientIp($request)
    {
        if (isset($_SERVER[config('maintenance.server_key_client_ip')])) {
            return $_SERVER[config('maintenance.server_key_client_ip')];
        }
        return $request->getClientIp();
    }
}

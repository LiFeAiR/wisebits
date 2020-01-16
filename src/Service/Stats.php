<?php


namespace App\Service;

use Predis\Client;


class Stats
{
    private const KEY = "stats";
    private Client $redis;

    /**
     * Stats constructor.
     */
    public function __construct()
    {
        $this->redis = new Client([
            "host" => 'infra-dc-redis',
        ]);
    }

    public function stats(): array
    {
        $keys = array_keys($this->redis->hgetall(self::KEY));
        $data = [];
        foreach ($keys as $key) {
            $data[$key] = $this->redis->get(self::KEY . $key);
        }

        return $data;
    }

    public function inc(string $countryCode): array
    {
        $this->redis->hset(self::KEY, $countryCode, 1);
        $this->redis->incr(self::KEY . $countryCode);

        return ['OK'];
    }
}
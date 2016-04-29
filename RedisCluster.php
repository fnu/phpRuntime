<?php

/**
 * 集群版的 Redis
 */
class RedisCluster extends Redis
{

    const REDIS_NOT_FOUND     = 0;
    const REDIS_STRING        = 1;
    const REDIS_SET           = 2;
    const REDIS_LIST          = 3;
    const REDIS_ZSET          = 4;
    const REDIS_HASH          = 5;
    const ATOMIC              = 0;
    const MULTI               = 1;
    const OPT_SERIALIZER      = 1;
    const OPT_PREFIX          = 2;
    const OPT_READ_TIMEOUT    = 3;
    const SERIALIZER_NONE     = 0;
    const SERIALIZER_PHP      = 1;
    const OPT_SCAN            = 4;
    const SCAN_RETRY          = 1;
    const SCAN_NORETRY        = 0;
    const OPT_SLAVE_FAILOVER  = 5;
    const FAILOVER_NONE       = 0;
    const FAILOVER_ERROR      = 1;
    const FAILOVER_DISTRIBUTE = 2;
    const AFTER               = 'after';
    const BEFORE              = 'before';

    /**
     * @param string|null $cluster 集群名称
     * @param array $hostArr 集群的主机, [ip:port]
     */
    public function __construct($clusterName, array $hostArr, $timeout = 1, $readTimeout = 1);

    public function cluster($key = '', $cmd = '')
    {

    }

}

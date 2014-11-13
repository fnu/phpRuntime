<?php

/**
 * @link https://github.com/nicolasff/phpredis
 */
class Redis
{

    const REDIS_STRING    = 1;
    const REDIS_SET       = 2;
    const REDIS_LIST      = 3;
    const REDIS_ZSET      = 4;
    const REDIS_HASH      = 5;
    const REDIS_NOT_FOUND = 0;

    public function __construct();

    /**
     * Connects to a Redis instance.
     *
     * @link  https://github.com/nicolasff/phpredis#connect-open
     * @example $redis->connect('127.0.0.1', 6379);
     * @example $redis->connect('127.0.0.1'); // port 6379 by default
     * @example $redis->connect('127.0.0.1', 6379, 2.5); // 2.5 sec timeout.
     * @example $redis->connect('/tmp/redis.sock'); // unix domain socket.
     *
     * @param string $host can be a host, or the path to a unix domain socket
     * @param int $port optional
     * @param float $timeout value in seconds (optional, default is 0 meaning unlimited)
     */
    public function connect($host, $port = 6379, $timeout = 0);

    public function pconnect();

    public function close();

    /**
     * Check the current connection status
     * STRING: +PONG on success. Throws a RedisException object on connectivity error, as described above.
     *
     * @throws RedusException   如果无法连接到Redis服务器时, 将抛出异常;
     * @return string   +PONG
     */
    public function ping();

    /**
     * 取得键数据
     *
     * @param   string $key
     * @return  string|boolen 如果 $key 不存在, 返回 (bool)false
     */
    public function get($key);

    /**
     * 一次, 取得所有指定键的值.
     * 如果对应的键不存在, 那么, 对应的位置将填充为 false
     *
     * @param array $keys array('key1', 'key2', 'key3');
     * @return array
     */
    public function mGet($keys);

    /**
     * 给一个键设置字符串值
     * SET keyname datalength data
     * (SET bruce 10 paitoubing:保存key为burce,
     * 字符串长度为10的一个字符串paitoubing到数据库)，
     * data最大不可超过1G。
     *
     * @param string $key
     * @param string $val
     * @return bool
     */
    public function set($key, $val);

    /**
     * 同时设置多个 string 类型的键
     *
     * @example $redis->mSet(array('key0' => 'value0', 'key1' => 'value1'));
     * @param array $array array('key1'=>'value1', 'key2'=>'value2');
     * @return boolean
     */
    public function mSet($array);

    /**
     * 设置键的时候, 同时指定它的TTL
     *
     * @param string $key 键名
     * @param int    $ttl 生存时间(秒)
     * @param string $val 值
     *
     * @return boolean
     */
    public function setex($key, $ttl, $val);

    /**
     * 设置键的时候, 同时指定它的TTL
     *
     * @param string $key 键名
     * @param int    $ttl 生存时间(毫秒)
     * @param string $val 值
     *
     * @return boolean
     */
    public function pSetex($key, $ttl, $val);

    /**
     * SETNX与SET的区别是:
     * SET可以创建与更新key的value，
     * 而SETNX是如果key不存在，则创建key与value数据
     *
     * @param string $key
     * @param string $val
     * @return  boolean
     */
    public function setnx($key, $val);

    /**
     * 读取旧数据, 并新更新新数据.
     * 注意, 返回的是旧数据!
     *
     * @param string $key
     * @param mix $newValue
     * @return mix/false    如果没有旧数据, 返回 (bool)false
     */
    public function getSet($key, $newValue);

    public function randomKey();

    /**
     * 重命名key的名称, 如果 new key 已经存在, 执行失败.
     */
    public function renameKey(string $oldKey, string $newKey);

    public function renameNx();

    public function getMultiple();

    /**
     * 判断一个键是否存在
     * @return  boolean
     */
    public function exists(string $key);

    public function delete();

    /**
     * 自增函数.具有原子操作,适合用了"计数器"
     *
     * @param   string $key
     * @return  int     自增后的数值
     */
    public function incr(string $key);

    /**
     * 令键值自增指定数值
     * @param   string  $key
     * @param   int     $int
     * @return  int     自增后的数值
     */
    public function incrBy(string $key, int $int);

    /**
     * 自减键值
     *
     * @param string $key
     * @return  int     自减后的数值
     */
    public function decr($key);

    /**
     * 令键值自减指定数值
     * @param   string  $key
     * @param   int     $int
     * @return  int     自减后的数值
     */
    public function decrBy($key, $int);

    /**
     * 返回某个key元素的数据类型
     * ( none:不存在,string:字符,list,set,zset,hash)
     * 可是, 我测试的结果却是 int 0/1
     * @param   string  $key
     * @return  int
     */
    public function type($key);

    public function append();

    public function getRange();

    public function setRange();

    public function getBit();

    public function setBit();

    public function strlen();

    public function getKeys();

    public function sort();

    /**
     * 将值插入到列表的头部 (左边)
     *
     * @param string $key   列表的键
     * @param string $value Push到列表的值
     * @return int|boolean  如果Push成功, 返回列表的长度, 如果失败, 返回false
     */
    public function lPush($key, $value);

    /**
     * 将值插入到列表的尾部 (右边)
     *
     * @param string $key   列表的键
     * @param string $value Push到列表的值
     * @return int|boolean  如果Push成功, 返回列表的长度, 如果失败, 返回false
     */
    public function rPush($key, $value);

    public function lPushx();

    public function rPushx();

    public function lPop();

    public function rPop();

    public function blPop();

    public function brPop();

    public function lSize();

    public function lRemove();

    public function listTrim();

    public function lGet();

    public function lGetRange();

    public function lSet();

    public function lInsert();

    /**
     * @link https://github.com/nicolasff/phpredis#sadd Github
     *
     * @example $redis->sAdd($key, $value) 单个值
     * @example $redis->sAdd($key, $value1, $value2...$valueN) 多个值
     *
     * @param string $key 集合的名称
     * @param string|int $value 集合的值
     *
     * @return long The number of elements added to the set.
     */
    public function sAdd($key, $value);

    public function sSize();

    public function sRemove();

    public function sMove();

    public function sPop();

    public function sRandMember();

    public function sContains();

    public function sMembers();

    public function sInter();

    public function sInterStore();

    public function sUnion();

    public function sUnionStore();

    public function sDiff();

    public function sDiffStore();

    public function setTimeout();

    public function save();

    public function bgSave();

    public function lastSave();

    public function flushDB();

    public function flushAll();

    /**
     * 返回当前数据库的key的总数
     * @return  int
     */
    public function dbSize();

    public function auth();

    /**
     * 查找某个键还有多长时间过期,返回时间秒
     * 永不过期, 返回 -1;
     *
     * @param string $key
     * @return int
     */
    public function ttl($key);

    public function persist();

    /**
     * 返回 Redis 当前的状态.
     * 包括版本号,CPU占用, 内存占用等等...
     * @return array
     */
    public function info();

    /**
     * 选择,切换到另一个数据库
     * @param int  $dbID
     */
    public function select($dbID = 0);

    /**
     * 把一个键移动到另一个库中.
     */
    public function move();

    public function bgrewriteaof();

    public function slaveof();

    public function msetnx();

    public function rpoplpush();

    public function zAdd();

    public function zDelete();

    public function zRange();

    public function zReverseRange();

    /**
     * 返回有序集 key 中，所有 score 值介于 min 和 max 之间(包括等于 min 或 max )的成员。
     * 有序集成员按 score 值递增(从小到大)次序排列。
     * 具有相同 score 值的成员按字典序(lexicographical order)来排列(该属性是有序集提供的，不需要额外的计算)。
     * 可选的 LIMIT 参数指定返回结果的数量及区间(就像SQL中的 SELECT LIMIT offset, count )，
     * 注意当 offset 很大时，定位 offset 的操作可能需要遍历整个有序集，此过程最坏复杂度为 O(N) 时间。
     * 可选的 WITHSCORES 参数决定结果集是单单返回有序集的成员，还是将有序集成员及其 score 值一起返回。
     * 该选项自 Redis 2.0 版本起可用。
     * 区间及无限
     * min 和 max 可以是 -inf 和 +inf ，这样一来，你就可以在不知道有序集的最低和最高 score 值的情况下，使用 ZRANGEBYSCORE 这类命令。
     * 默认情况下，区间的取值使用闭区间 (小于等于或大于等于)，你也可以通过给参数前增加 ( 符号来使用可选的开区间 (小于或大于)。
     *
     * @param string    $key        键名
     * @param int       $start      Score开始
     * @param int       $end        Score结束
     * @param array     $options    Two options are available: withscores => TRUE, and limit => array($offset, $count)
     */
    public function zRangeByScore($key, $start, $end, $options);

    /**
     * 类似于 zRangeByScore 方法.
     * 但是:
     * 有序集成员按 score 值递减(从大到小)的次序排列。
     *
     * @param string    $key        键名
     * @param int       $start      Score开始
     * @param int       $end        Score结束
     * @param array     $options    Two options are available: withscores => TRUE, and limit => array($offset, $count)
     */
    public function zRevRangeByScore($key, $start, $end, $options);

    /**
     * 返回有序集 key 中，
     * score 值在 $start 和 $end 之间(默认包括 score 值等于 min 或 max )的成员的数量。
     *
     * @param string $key 键名
     * @param string $start score的开始
     * @param string $end   score的结束
     */
    public function zCount($key, $start, $end);

    public function zDeleteRangeByScore();

    public function zDeleteRangeByRank();

    /**
     * 返回 有序集(Sorted set) 的成员数量
     *
     * @param string $key 键名
     */
    public function zCard($key);

    public function zScore();

    public function zRank();

    public function zRevRank();

    public function zInter();

    public function zUnion();

    /**
     * 为有序集 key 的成员 member 的 score 值加上增量 increment
     *
     * @example $redis->zIncrBy('key', 2.5, 'member1');
     * @example $redis->zIncrBy('key', 1, 'member1');
     *
     * @link http://www.redisdoc.com/en/latest/sorted_set/zincrby.html
     */
    public function zIncrBy($key, $value, $member);

    public function expireAt();

    public function hGet($key, $hashKey);

    public function hSet($key, $hashKey, $value);

    public function hSetNx();

    public function hDel();

    public function hLen();

    public function hKeys();

    public function hVals();

    /**
     * @return array|null
     */
    public function hGetAll($key);

    public function hExists();

    /**
     * 给Hash的一个成员做自增(自减)
     *
     * @param string $key       Redis键名
     * @param string $member    成员名
     * @param integer $value    步长.
     *
     * @return long the new value
     */
    public function hIncrBy($key, $member, $value);

    /**
     * 批量设置Hash中的成员.
     * @param string $key Redis键名
     * @param array $val 带索引的数组
     *
     * @link https://github.com/nicolasff/phpredis#hmset
     */
    public function hMset($key, $val = array('name' => 'Joe', 'salary' => 2000));

    public function hMget();

    public function multi();

    public function discard();

    public function exec();

    public function pipeline();

    public function watch();

    public function unwatch();

    public function publish();

    public function subscribe();

    public function unsubscribe();

    public function getOption();

    public function setOption();

    public function open();

    public function popen();

    /**
     * 返回一个 List 的长度
     *
     * @param string $key
     * @return 返回一个 List 的长度
     */
    public function lLen($key);

    public function sGetMembers();

    public function mget();

    /**
     * 设置某个key的过期时间(秒),
     * (EXPIRE bruce 1000：设置bruce这个key1000秒后系统自动删除)
     *
     * @param string $key
     * @param int $ttl
     *
     * @return boolean 成功返回 true, 失败返回 false
     */
    public function expire($key, $ttl = -1);

    public function zunionstore();

    public function zinterstore();

    public function zRemove();

    /**
     * 移除有序集 key 中的一个或多个成员，不存在的成员将被忽略。
     * 当 key 存在但不是有序集类型时，返回一个错误。
     *
     * @param string $key 键名
     * @param string $member 成员名
     */
    public function zRem($key, $member);

    public function zRemoveRangeByScore();

    public function zRemRangeByScore();

    public function zRemRangeByRank();

    public function zSize();

    /**
     * 截取一个键的子串
     *
     * @param string $key       键名.
     * @param integer $start    开始位置
     * @param integer $end      结束位置
     */
    public function substr(string $key, integer $start, integer $end);

    public function rename();

    /**
     * 删除一个键
     *
     * @param string $key
     */
    public function del(string $key);

    /**
     * 返回匹配的key列表
     * foo*:查找foo开头的keys, 也支持 *ad*cd* 这样的方式
     * @param   string  $pattern
     * @return  array
     */
    public function keys(string $pattern);

    public function lrem();

    public function ltrim();

    public function lindex();

    public function lrange();

    public function scard();

    public function srem();

    public function sIsMember();

    public function zrevrange();
}

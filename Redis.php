<?php

/**
 * @link https://github.com/phpredis/phpredis
 */
class Redis
{

    /** Redis 键类型:字符串 */
    const REDIS_STRING = 1;

    /** Redis 键类型:集合 */
    const REDIS_SET = 2;

    /** Redis 键类型:列表 */
    const REDIS_LIST = 3;

    /** Redis 键类型:有序集合 */
    const REDIS_ZSET = 4;

    /** Redis 键类型:哈希表 */
    const REDIS_HASH = 5;

    /** Redis 键类型:未知 */
    const REDIS_NOT_FOUND = 0;

    public function __construct();

    /**
     * Connects to a Redis instance.
     *
     * @link  https://github.com/phpredis/phpredis#connect-open
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

    /**
     * 跟 connect() 类似
     * 但相同的 "host + port + timeout", "host + persistent_id", "unix socket + timeout" 会复用连接.
     * 对于 "host + port..." 相同, 但希望不同连接使用不同的DB的场景, 建议使用不同的$persistent_id
     *
     * @link https://github.com/phpredis/phpredis#pconnect-popen
     *
     * @param string $host can be a host, or the path to a unix domain socket
     * @param int    $port optional
     * @param float  $timeout  value in seconds (optional, default is 0 meaning unlimited)
     * @param string $persistent_id identity for the requested persistent connection
     * @param int    $retry_interval value in milliseconds (optional)
     * @reutrn boolean
     */
    public function pconnect($host, $port, $timeout, $persistent_id, $retry_interval);

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
     * 字符串长度为10的一个字符串paitoubing到数据库),
     * data最大不可超过1G.
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
     * @link https://github.com/phpredis/phpredis#setex-psetex
     *
     * @param string $key 键名
     * @param int    $ttl 生存时间(秒)
     * @param string $val 值
     *
     * @return boolean
     */
    public function setEx($key, $ttl, $val);

    /**
     * 设置键的时候, 同时指定它的TTL
     *
     * @param string $key 键名
     * @param int    $ttl 生存时间(毫秒)
     * @param string $val 值
     *
     * @return boolean
     */
    public function pSetEx($key, $ttl, $val);

    /**
     * SETNX与SET的区别是:
     * SET可以创建与更新key的value,
     * 而SETNX是如果key不存在, 则创建key与value数据
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

    /**
     * 是列表的阻塞式(blocking)弹出原语
     * @link https://github.com/phpredis/phpredis#blpop-brpop
     * @link http://redisdoc.com/list/blpop.html
     */
    public function blPop();

    /**
     * @link https://github.com/phpredis/phpredis#blpop-brpop
     * @link http://redisdoc.com/list/brpop.html
     */
    public function brPop();

    public function lSize();

    public function lRemove();

    public function listTrim();

    public function lGet();

    public function lGetRange();

    public function lSet();

    public function lInsert();

    /**
     * @link https://github.com/phpredis/phpredis#sadd Github
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

    /**
     * 移除集合 key 中的一个或多个 member 元素
     * 不存在的 member 元素会被忽略
     *
     * 在 Redis 2.4 版本以前, sRem 只接受单个 member 值
     *
     * @link https://github.com/phpredis/phpredis#srem-sremove
     * @link http://redis.io/commands/srem
     * @link http://redisdoc.com/set/srem.html
     */
    public function sRem($key, $member);

    /**
     * 将 member 元素从 source 集合移动到 destination 集合
     * 这是原子性操作
     *
     * @link http://redisdoc.com/set/smove.html
     * @link https://github.com/phpredis/phpredis#smove
     * @link http://redis.io/commands/smove
     *
     * @return boolean
     */
    public function sMove($source, $destination, $member);

    public function sPop();

    /**
     * 如果命令执行时, 只提供了 key 参数, 那么返回集合中的一个随机元素.
     *
     * 如果 count 为正数, 且小于集合基数,
     * 那么命令返回一个包含 count 个元素的数组, 数组中的元素各不相同.
     *
     * 如果 count 大于等于集合基数, 那么返回整个集合
     *
     * 如果 count 为负数, 那么命令返回一个数组,
     * 数组中的元素可能会重复出现多次, 而数组的长度为 count 的绝对值.
     *
     * 该操作和 sPop 相似, 但 sPop 将随机元素从集合中移除并返回,
     * 而 sRandMember 则仅仅返回随机元素, 而不对集合进行任何改动.
     *
     * @link http://redisdoc.com/set/srandmember.html
     * @link https://github.com/phpredis/phpredis#srandmember
     * @param string $key   集合的键值
     * @param int    $count 返回成员数, 默认为1
     * @return array
     */
    public function sRandMember($key, $count = 1);

    public function sContains();

    /**
     * 返回集合 key 中的所有成员
     * 不存在的 key 被视为空集合
     *
     * @link http://redisdoc.com/set/smembers.html
     * @link https://github.com/phpredis/phpredis#smembers-sgetmembers
     * @param string $key 集合的键值
     * @return array
     */
    public function sMembers($key);

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
     *
     * @example $redis->info(); // standard redis INFO command
     * @example $redis->info("COMMANDSTATS"); // Information on the commands that have been run (>=2.6 only)
     * @example $redis->info("CPU"); // just CPU information from Redis INFO
     *
     * @link https://github.com/phpredis/phpredis#info
     * @link http://redis.io/commands/info
     *
     * @return array|mixed
     */
    public function info($group = 'all');

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

    /**
     * 将一个 member 元素及其 score 值加入到有序集 key 当中
     *
     * 如果某个 member 已经是有序集的成员
     * 那么更新这个 member 的 score 值,
     * 并通过重新插入这个 member 元素, 来保证该 member 在正确的位置上
     *
     * @link http://redisdoc.com/sorted_set/zadd.html
     * @link https://github.com/phpredis/phpredis/#zadd
     *
     * @param string $key    键名
     * @param float  $value  排序值, 可以是整数值或双精度浮点数
     * @param string $member 成员名
     *
     * @return int 被成功添加的新成员的数量, 不包括那些被更新的, 或已经存在的成员
     */
    public function zAdd($key, $value, $member);

    public function zDelete();

    public function zRange();

    public function zReverseRange();

    /**
     * 返回有序集 key 中, 所有 score 值介于 min 和 max 之间(包括等于 min 或 max )的成员.
     * 有序集成员按 score 值递增(从小到大)次序排列.
     * 具有相同 score 值的成员按字典序(lexicographical order)来排列(该属性是有序集提供的, 不需要额外的计算).
     * 可选的 LIMIT 参数指定返回结果的数量及区间(就像SQL中的 SELECT LIMIT offset, count ),
     * 注意当 offset 很大时, 定位 offset 的操作可能需要遍历整个有序集, 此过程最坏复杂度为 O(N) 时间.
     * 可选的 WITHSCORES 参数决定结果集是单单返回有序集的成员, 还是将有序集成员及其 score 值一起返回.
     * 该选项自 Redis 2.0 版本起可用.
     * 区间及无限
     * min 和 max 可以是 -inf 和 +inf , 这样一来, 你就可以在不知道有序集的最低和最高 score 值的情况下, 使用 ZRANGEBYSCORE 这类命令.
     * 默认情况下, 区间的取值使用闭区间 (小于等于或大于等于), 你也可以通过给参数前增加 ( 符号来使用可选的开区间 (小于或大于).
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
     * 有序集成员按 score 值递减(从大到小)的次序排列.
     *
     * @param string    $key        键名
     * @param int       $start      Score开始
     * @param int       $end        Score结束
     * @param array     $options    Two options are available: withscores => TRUE, and limit => array($offset, $count)
     */
    public function zRevRangeByScore($key, $start, $end, $options);

    /**
     * 返回有序集 key 中,
     * score 值在 $start 和 $end 之间(默认包括 score 值等于 min 或 max )的成员的数量.
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
     * @link http://redisdoc.com/sorted_set/zincrby.html
     * @param string $key    键名
     * @param int    $value  增量
     * @param string $member 成员名
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
     * @link https://github.com/phpredis/phpredis#hmset
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
     * 移除有序集 key 中的一个或多个成员, 不存在的成员将被忽略.
     * 当 key 存在但不是有序集类型时, 返回一个错误.
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

    /**
     * 判断 member 元素是否集合 key 的成员
     *
     * 如果 member 元素是集合的成员, 返回 true
     * 如果 member 元素不是集合的成员, 或 key 不存在, 返回 false
     *
     * @link http://redisdoc.com/set/sismember.html
     * @link https://github.com/phpredis/phpredis#sismember-scontains
     * @return boolean
     */
    public function sIsMember($key, $member);

    public function zrevrange();
}

<?php

/*
 * 本文档拷贝自: https://github.com/Gsinhi/swoole-ide
 */

/**
 * 当前Swoole的版本号
 */
define('SWOOLE_VERSION', '1.7.17');

/**
 * 使用Base模式，业务代码在Reactor中直接执行
 */
define('SWOOLE_BASE', 4);

/**
 * 使用线程模式，业务代码在Worker线程中执行
 */
define('SWOOLE_THREAD', 2);

/**
 * 使用进程模式，业务代码在Worker进程中执行
 */
define('SWOOLE_PROCESS', 3);

/**
 * 创建tcp socket
 */
define('SWOOLE_SOCK_TCP', 1);

/**
 * 创建tcp ipv6 socket
 */
define('SWOOLE_SOCK_TCP6', 6);

/**
 * 创建udp socket
 */
define('SWOOLE_SOCK_UDP', 2);

/**
 * 创建udp ipv6 socket
 */
define('SWOOLE_SOCK_UDP6', 4);

/**
 * 同步客户端
 */
define('SWOOLE_SOCK_SYNC', 0);

/**
 * 异步客户端
 */
define('SWOOLE_SOCK_ASYNC', 1);

/**
 * 创建文件锁
 */
define('SWOOLE_FILELOCK', 2);

/**
 * 创建互斥锁
 */
define('SWOOLE_MUTEX', 3);

/**
 * 创建读写锁
 */
define('SWOOLE_RWLOCK', 1);

/**
 * 创建自旋锁
 */
//define('SWOOLE_RWLOCK', SWOOLE_SPINLOCK);

/**
 * 创建信号量
 */
define('SWOOLE_SEM', 4);

/** Swoole Server BOF * */

/**
 * 用于获取MySQLi的socket文件描述符。可将mysql的socket增加到swoole中，执行异步MySQL查询。
 *
 * 如果想要使用异步MySQL，需要在编译swoole时制定--enable-async-mysql
 * swoole_get_mysqli_sock仅支持mysqlnd驱动，php5.4以下版本不支持此特性
 *
 * @param mysqli $db
 *
 * @return int
 */
function swoole_get_mysqli_sock(mysqli $db)
{

}

/**
 * 用于设置进程的名称。
 *
 * 修改进程名称后，通过ps命令看到的将不再是php your_file.php。
 * 而是设定的字符串。 此函数接受一个字符串参数。
 * 此函数与PHP5.5提供的cli_set_process_title功能是相同的。
 * 但swoole_set_process_name可用于PHP5.2之上的任意版本。
 * swoole_set_process_name兼容性比cli_set_process_title要差，
 * 如果存在cli_set_process_title函数则优先使用cli_set_process_title。
 *
 * @param string $name
 */
function swoole_set_process_name($name)
{

}

/**
 * 获取swoole扩展的版本号
 *
 * @return string
 */
function swoole_version()
{

}

/**
 * 将标准的Unix Errno错误码转换成错误信息
 *
 * @param int $errno
 * @return string
 */
function swoole_strerror($errno)
{

}

/**
 * 获取最近一次系统调用的错误码，等同于C/C++的errno变量
 *
 * @return int
 */
function swoole_errno()
{

}

/**
 * 此函数用于获取本机所有网络接口的IP地址，目前只返回IPv4地址，返回结果会过滤掉本地loop地址127.0.0.1。
 * 结果数组是以interface名称为key的关联数组。比如 array("eth0" => "192.168.1.100")
 *
 * @return array
 */
function swoole_get_local_ip()
{

}

/** Swoole Server EOF * */
/** 异步文件系统IO Swoole Server BOF * */

/**
 * 异步读取文件内容
 *
 * swoole_async_readfile会将文件内容全部复制到内存，所以不能用于大文件的读取
 * 如果要读取超大文件，请使用swoole_async_read函数
 * swoole_async_readfile最大可读取4M的文件，受限于SW_AIO_MAX_FILESIZE宏
 *
 * @param string $filename
 * @param callenable $callback
 */
function swoole_async_readfile($filename, callenable $callback)
{

}

/**
 * swoole_async_writefile最大可写入4M的文件
 * swoole_async_writefile可以不指定回调函数
 *
 * @param string $filename
 * @param string $data
 * @param callenable $callback
 */
function swoole_async_writefile($filename, $data, callenable $callback)
{

}

/**
 * 异步读文件，使用此函数读取文件是非阻塞的，当读操作完成时会自动回调指定的函数
 *
 * 在读完后会自动回调$callback函数，回调函数接受4个参数：
 * $filename，文件名称
 * $content，读取到的分段内容，如果内容为空，表明文件已读完
 * $size，读取数据的最大长度，默认为8K
 * $offset，偏移文件指针，默认为0，表示从文件头部开始读取。必须大于等于0且小于文件总长度
 *
 * @param string $filename
 * @param callenable $callback
 * @param int $size
 * @param int $offset
 *
 * @return boolean
 */
function swoole_async_read($filename, callenable $callback, $size = 8192, $offset = 0)
{

}

/**
 * 异步写文件，与swoole_async_writefile不同，write是分段读写的。
 * 不需要一次性将要写的内容放到内存里，所以只占用少量内存。
 * swoole_async_write通过传入的offset参数来确定写入的位置
 *
 * 当offset为-1时表示追加写入到文件的末尾
 *
 * @param string $filename
 * @param string $content
 * @param int $offset
 * @param callenable $callback
 *
 * @return boolean
 */
function swoole_async_write($filename, $content, $offset = -1, callenable $callback = NULL)
{

}

/**
 * 将域名解析为IP地址。调用此函数是非阻塞的，调用会立即返回。将向下执行后面的代码。
 * 当DNS查询完成时，自动回调指定的callback函数。
 * 当DNS查询失败时，比如域名不存在，回调函数传入的$ip为空
 *
 * @param string $domain
 * @param callenable $callback
 */
function swoole_async_dns_lookup($domain, callenable $callback)
{

}

/** 异步文件系统IO Swoole Server EOF * */
/** EventLoop Swoole Server BOF * */

/**
 * swoole_event_add函数用于将一个socket加入到swoole的reactor事件监听中, 此函数可以用在Server或Client模式下
 *
 * 参数1可以为以下三种类型：
 * int，就是文件描述符,包括swoole_client的socket,以及第三方扩展的socket（比如mysql）
 * stream资源，就是stream_socket_client/fsockopen 创建的资源
 * sockets资源，就是sockets扩展中 socket_create创建的资源 需要在编译时加入 ./configure --enable-sockets
 * 参数2为可读回调函数，参数3为可写事件回调，可以是字符串函数名、对象+方法、类静态方法或匿名函数，当此socket可读时回调指定的函数。
 *
 * swoole_event_add在swoole1.6.2+之后可用
 * 第3，4个参数在1.7.1版本后可用，用于监听可写事件回调，以及设置读写事件的监听
 * 参数4为事件类型的掩码，可选择关闭/开启可读可写事件，如SWOOLE_EVENT_READ，SWOOLE_EVENT_WRITE，或者SWOOLE_EVENT_READ | SWOOLE_EVENT_WRITE
 *
 * 在Server程序中使用，可以理解为在worker/taskworker进程中将此socket注册到epoll事件中。
 * 在Client程序中使用，可以理解为在客户端进程中将此socket注册到epoll事件中。
 *
 * @param int $sock
 * @param callenable $read_callback
 * @param callenable $write_callback
 * @param int $event_flag
 *
 * @return boolean
 */
function swoole_event_add($sock, callenable $read_callback, callenable $write_callback = null, $event_flag = null)
{

}

/**
 * 修改事件监听的回调函数和掩码
 *
 * 当$read_callback不为null时，将修改可读事件回调函数为指定的函数
 * 当$write_callback不为null时，将修改可写事件回调函数为指定的函数
 * $flag可关闭/开启，可写和可读事件的监听
 *
 * @param type $fd
 * @param callenable $read_callback
 * @param callenable $write_callback
 * @param int $flag
 */
function swoole_event_set($fd, callenable $read_callback, callenable $write_callback, $flag)
{

}

/**
 * swoole_event_del函数用于从reactor中移除监听的socket。swoole_event_del应当与swoole_event_add成对使用
 *
 * @param int $sock 参数为socket的文件描述符
 *
 * @return boolean
 */
function swoole_event_del($sock)
{

}

/**
 * 退出事件轮询，此函数仅在Client程序中有效
 */
function swoole_event_exit()
{

}

/**
 * PHP < 5.4的版本，需要在你的PHP脚本结尾处加swoole_event_wait函数。使脚本开始进行事件轮询
 */
function swoole_event_wait()
{

}

/**
 * swoole_event_write调用之前，必须在将socket加入event_loop，否则会发生错误
 *
 * swoole_event_write函数可以将stream/sockets资源的数据发送变成异步的，
 * 当缓冲区满了或者返回EAGAIN，swoole底层会将数据加入到发送队列，
 * socket可写时swoole底层会自动写入
 *
 * @param int $fp
 * @param string $data
 */
function swoole_event_write($fp, $data)
{

}

/** EventLoop Swoole Server EOF * */
/** 异步毫秒定时器 EOF * */

/**
 * 增加定时器
 *
 * $interval为定时器间隔，单位是毫秒，不能存在同样时间间隔的2个定时器
 * $callback为定时器的事件回调函数
 *
 * @param int $interval
 * @param callenable $callback
 */
function swoole_timer_add($interval, callenable $callback)
{

}

/**
 * 删除swoole_timer_add设置的定时器
 *
 * @param int $interval
 */
function swoole_timer_del($interval)
{

}

/**
 * 设置一个间隔时钟定时器，与after定时器不同的是tick定时器会持续触发，直到调用swoole_timer_clear清除。
 * 与swoole_timer_add不同的是tick定时器可以存在多个相同间隔时间的定时器
 *
 * @param int $ms 指定时间，单位为毫秒
 * @param callenable $callback 时间到期后所执行的函数，必须是可以调用的。callback函数不接受任何参数
 * @param callenable $param
 */
function swoole_timer_tick($ms, callenable $callback, callenable $param = null)
{

}

/**
 * 在指定的时间后执行函数
 *
 * @param int $after_time_ms 指定时间，单位为毫秒
 * @param callenable $callback_function 时间到期后所执行的函数，必须是可以调用的。callback函数不接受任何参数
 */
function swoole_timer_after($after_time_ms, callenable $callback_function)
{

}

/**
 * 使用定时器ID来删除定时器
 *
 * @param int $timer_id 定时器ID，调用swoole_timer_add/swoole_timer_after后会返回一个整数的ID。
 *
 * @return boolean
 */
function swoole_timer_clear($timer_id)
{

}

/** 异步毫秒定时器 EOF * */
final class swoole_server
{

    /**
     * @var array
     */
    public $setting = array();

    /**
     * @var int
     */
    public $master_pid = null;

    /**
     * @var int
     */
    public $manager_pid = null;

    /**
     * @var int
     */
    public $worker_id = null;

    /**
     * @var int
     */
    public $worker_pid = null;

    /**
     * 创建一个swoole server资源对象。
     * 别名： swoole_server_create
     *
     * @param string $host 参数用来指定监听的ip地址，如127.0.0.1，或者外网地址，或者0.0.0.0监听全部地址
     *                     127.0.0.1表示监听本机，0.0.0.0表示监听所有地址
     *                     使用::1表示监听本机，:: (0:0:0:0:0:0:0:0) 表示监听所有地址
     * @param int $port 监听的端口，如9501，监听小于1024端口需要root权限，如果此端口被占用server->start时会失败
     * @param int $mode 运行的模式，swoole提供了3种运行模式，默认为多进程模式
     * @param int $sock_type 指定socket的类型，支持TCP/UDP、TCP6/UDP6、UnixSock Stream/Dgram 6种
     */
    public function __construct($host, $port, $mode = SWOOLE_PROCESS, $sock_type = SWOOLE_SOCK_TCP);

    /**
     * swoole_server->set函数用于设置swoole_server运行时的各项参数。
     * 服务器启动后通过$serv->setting来访问set函数设置的参数数组
     *
     * 别名： swoole_server_set(swoole_server $server, array $setting);
     *
     * @param array $setting
     */
    public function set(array $setting);

    /**
     * 注册Server的事件回调函数
     *
     * @param string $event 回调的名称, 大小写不敏感，具体内容参考回调函数列表
     * @param callenable $callback 回调的PHP函数，可以是函数名的字符串，类静态方法，对象方法数组，匿名函数。
     *
     * @return boolean
     */
    public function on($event, callenable $callback);

    /**
     * Swoole提供了public addListener来增加监听的端口
     *
     * swoole支持的Socket类型
     * SWOOLE_TCP/SWOOLE_SOCK_TCP       tcp ipv4 socket
     * SWOOLE_TCP6/SWOOLE_SOCK_TCP6     tcp ipv6 socket
     * SWOOLE_UDP/SWOOLE_SOCK_UDP       udp ipv4 socket
     * SWOOLE_UDP6/SWOOLE_SOCK_UDP6     udp ipv6 socket
     * SWOOLE_UNIX_DGRAM                unix socket dgram
     * SWOOLE_UNIX_STREAM               unix socket stream
     *
     * @param string $host
     * @param int $port
     * @param int $type
     */
    public function addListener($host, $port, $type = SWOOLE_SOCK_TCP);

    /**
     * 添加一个用户自定义的工作进程
     *
     * @param swoole_process $process
     * @return boolean
     */
    public function addProcess(swoole_process $process);

    /**
     * 监听一个新的Server端口，此方法是addlistener的别名
     *
     * @param string $host
     * @param int $port
     * @param int $type
     * @return boolean
     */
    public function listen($host, $port, $type);

    /**
     * 设置Server的事件回调函数
     *
     * $event_name 回调的名称, 大小写不敏感，具体内容参考回调函数列表
     * $event_callback_function 回调的PHP函数，可以是字符串，数组，匿名函数
     *
     * handler/on/set 方法只能在public start前调用
     *
     * 别名：bool swoole_server_handler(swoole_server $serv, $event_name, callenable $event_callback_function);
     *      第一个参数是swoole的资源对象
     *
     * @param string $event_name
     * @param callenable $event_callback_function
     */
    public function handler($event_name, callenable $event_callback_function);

    /**
     * 启动server，监听所有TCP/UDP端口
     */
    public function start();

    /**
     * 重启所有worker进程
     */
    public function reload();

    /**
     * 关闭服务器
     */
    public function shutdown();

    /**
     * 设置定时器
     *
     * 别名： boolean swoole_server_addtimer(swoole_server $serv,$interval);
     *
     * @param int $interval
     * @return boolean
     */
    public function addtimer($interval);

    /**
     * 删除定时器
     *
     * @param int $interval
     * @return boolean
     */
    public function deltimer($interval);

    /**
     * 在指定的时间后执行函数
     *
     * @param int $after_time_ms 指定时间，单位为毫秒
     * @param callenable $callback_function 时间到期后所执行的函数，必须是可以调用的。callback函数不接受任何参数
     */
    public function after($after_time_ms, callenable $callback_function);

    /**
     * 关闭客户端连接
     *
     * @param int $fd
     * @param int $from_id
     *
     * @rturn boolean
     */
    public function close($fd, $from_id = 0);

    /**
     * 向客户端发送数据
     *
     * @param int $fd
     * @param string $data 发送的数据。TCP协议最大不得超过2M，UDP协议不得超过64K
     * @param int $from_id
     *
     * @return boolean
     */
    public function send($fd, $data, $from_id = 0);

    /**
     * 发送文件到TCP客户端连接
     *
     * @param int $fd
     * @param string $filename
     *
     * @return boolean
     */
    public function sendfile($fd, $filename);

    /**
     * 向任意的客户端IP:PORT发送UDP数据包
     *
     * @param string $ip 为IPv4字符串，如192.168.1.102。如果IP不合法会返回错误
     * @param int $port 为 1-65535的网络端口号，如果端口错误发送会失败
     * @param string $data 要发送的数据内容，可以是文本或者二进制内容
     * @param boolean $ipv6 是否为IPv6地址，可选参数，默认为false
     *
     * @return boolean
     */
    public function sendto($ip, $port, $data, $ipv6 = false);

    /**
     * 此函数可以向任意worker进程或者task进程发送消息。
     * 在非主进程和管理进程中可调用。收到消息的进程会触发onPipeMessage事件
     *
     * @param string $message 为发送的消息数据内容
     * @param int $dst_worker_id 为目标进程的ID，范围是0 ~ (worker_num + task_worker_num - 1)
     *
     * @return boolean
     */
    public function sendMessage($message, $dst_worker_id);

    /**
     * 获取连接的信息
     *
     * @param int $fd
     * @param int $fromid
     *
     * @return array
     */
    public function connection_info($fd = null, $fromid = null);

    /**
     * 用来遍历当前Server所有的客户端连接
     * connection_list方法是基于共享内存的，不存在IOWait，遍历的速度很快
     * 另外connection_list会返回所有TCP连接，而不仅仅是当前worker进程的TCP连接
     *
     * @param int $start_fd
     * @param int $pagesize
     *
     * @return array|false
     */
    public function connection_list($start_fd = 0, $pagesize = 10);

    /**
     * 将连接绑定一个用户定义的ID，可以设置dispatch_mode=5设置已此ID值进行hash固定分配
     * 可以保证某一个UID的连接全部会分配到同一个Worker进程
     *
     * @param int $fd 连接的文件描述符
     * @param int $uid 指定UID
     */
    public function bind($fd, $uid);

    /**
     * 得到当前Server的活动TCP连接数，启动时间，accpet/close的总次数等信息
     */
    public function stats();

    /**
     * 投递一个异步任务到task_worker池中。此函数会立即返回。worker进程可以继续处理新的请求
     *
     * @param string $data 要投递的任务数据
     * @param int $dst_worker_id 可以制定要给投递给哪个task进程，
     *                          传入ID即可，范围是0 - serv->task_worker_num
     *                          返回值为整数($task_id)，表示此任务的ID。
     *                          如果有finish回应，onFinish回调中会携带$task_id参数
     *
     * @return boolean
     */
    public function task($data, $dst_worker_id = -1);

    /**
     * taskwait与task方法作用相同，用于投递一个异步的任务到task进程池去执行
     * 与task不同的是taskwait是阻塞等待的，直到任务完成或者超时返回
     *
     * @param string $task_data
     * @param float $timeout
     * @param int $dst_worker_id
     */
    public function taskwait($task_data, float $timeout = 0.5, $dst_worker_id = -1);

    /**
     * 此函数用于在task进程中通知worker进程，投递的任务已完成
     *
     * public finish是可选的。如果worker进程不关心任务执行的结果，不需要调用此函数
     * 在onTask回调函数中return字符串，等同于调用finishs
     */
    public function finish();

    /**
     * 检测服务器所有连接，并找出已经超过约定时间的连接。
     * 如果指定if_close_connection，则自动关闭超时的连接。未指定仅返回连接的fd数组
     *
     * $if_close_connection是否关闭超时的连接，默认为true
     * 调用成功将返回一个连续数组，元素是已关闭的$fd, 调用失败返回false
     *
     * @param boolean $if_close_connection
     *
     * @return boolean
     */
    public function heartbeat(bool $if_close_connection = true);
}

final class swoole_client
{

    /**
     * @var int
     */
    public $errCode = null;

    /**
     * @var int
     */
    public $sock = null;

    /**
     * @param int $sock_type 表示socket的类型，如TCP/UDP。
     * @param int $is_sync 表示同步阻塞还是异步非阻塞，默认为同步阻塞
     * @param string $key 用于长连接的Key，默认使用IP:PORT作为key。相同key的连接会被复用
     */
    public function __construct($sock_type, $is_sync = SWOOLE_SOCK_SYNC, $key);

    /**
     * 注册异步事件回调函数，调用on方法会使当前的socket变成非阻塞的
     *
     * @param string 支持connect/error/receive/close 4种
     * @param callenable $callback 可以是函数名字符串、匿名函数、类静态方法、对象方法
     */
    public function on($event, callenable $callback);

    /**
     * 连接到远程服务器
     *
     * $flag参数在UDP类型时表示是否启用udp_connect
     * 设定此选项后将绑定$host与$port，此UDP将会丢弃非指定host/port的数据包。
     * $flag参数在TCP类型,$flag=1表示设置为非阻塞socket，connect会立即返回
     * 如果将$flag设置为1，那么在send/recv前必须使用swoole_client_select来检测是否完成了连接
     *
     * @param string $host 是远程服务器的地址
     * @param int $port 远程服务器端口
     * @param float $timeout 是网络IO的超时，单位是s，支持浮点数。默认为0.1s，即100ms
     * @param int $flag 参数在UDP类型时表示是否启用udp_connect
     *
     * @return boolean
     */
    public function connect($host, $port, float $timeout = 0.1, $flag = 0);

    /**
     * 返回swoole_client的连接状态
     *
     * @return boolean
     */
    public function isConnected();

    /**
     * 用于获取客户端socket的本地host:port，必须在连接之后才可以使用
     *
     * @return  array
     */
    public function getsockname();

    /**
     * 获取对端socket的IP地址和端口，仅支持SWOOLE_SOCK_UDP/SWOOLE_SOCK_UDP6类型的swoole_client对象
     * 此函数必须在$client->recv() 之后调用
     *
     * @return string
     */
    public function getpeername();

    /**
     * 发送数据到远程服务器，必须在建立连接后，才可向Server发送数据
     * 如果未执行connect，调用send会触发PHP警告
     *
     * $data参数为字符串，支持二进制数据 成功发送返回的已发数据长度
     * 失败返回false，并设置$swoole_client->errCode
     *
     * @param string $data
     *
     * @return int
     */
    public function send($data);

    /**
     * 向任意IP:PORT的主机发送UDP数据包，仅支持SWOOLE_SOCK_UDP/SWOOLE_SOCK_UDP6类型的swoole_client对象。
     *
     * @param string $ip
     * @param int $port
     * @param string $data 要发送的数据内容，不得超过64K
     *
     * @return boolean
     */
    public function sendto($ip, $port, $data);

    /**
     * 发送文件到服务器，本函数是基于sendfile操作系统调用的
     *
     * @param string $filename
     * @return boolean
     */
    public function sendfile($filename);

    /**
     * recv方法用于从服务器端接收数据
     *
     * @param int $size 接收数据的最大长度
     * @param boolean $waitall 是否等待所有数据到达后返回
     *
     * @return string
     */
    public function recv($size = 65535, $waitall = 0);

    /**
     * 关闭连接
     */
    public function close();
}

final class swoole_process
{

    /**
     *
     * @param callenable $function 子进程创建成功后要执行的函数
     * @param boolean $redirect_stdin_stdout 重定向子进程的标准输入和输出。
     *          启用此选项后，在进程内echo将不是打印屏幕，而是写入到管道。
     *          读取键盘输入将变为从管道中读取数据。 默认为阻塞读取
     * @param boolean $create_pipe 是否创建管道，启用$redirect_stdin_stdout后，
     *                  此选项将忽略用户参数，强制为true 如果子进程内没有进程间通信，可以设置为false
     */
    public function __construct(callenable $function, $redirect_stdin_stdout = false, $create_pipe = true);

    /**
     * 执行fork系统调用
     *
     * $process->pid 属性为子进程的PID
     * $process->pipe 属性为管道的文件描述符
     */
    public function start();

    /**
     * 修改进程名称。此函数是swoole_set_process_name的别名
     *
     * @param string $new_process_name
     */
    public function name($new_process_name);

    /**
     * 执行一个外部程序，此函数是exec系统调用的封装。
     *
     * 由于exec系统调用会使用指定的程序覆盖当前程序，子进程需要读写标准输出与父进程进行通信
     * 如果未指定redirect_stdin_stdout = true，执行exec后子进程与父进程无法通信
     *
     * @param string $execfile
     * @param array $args
     */
    public function exec($execfile, array $args);

    /**
     * 向管道内写入数据
     *
     * 在子进程内调用write，主进程会收到数据
     * 在主进程内调用write，子进程会收到数据
     *
     * @param string $data
     */
    public function write($data);

    /**
     * 从管道中读取数据
     *
     * @param int $buffer_size
     */
    public function read($buffer_size = 8192);

    /**
     * 启用消息队列作为进程间通信
     *
     * useQueue方法接受2个可选参数。
     *
     * 创建消息队列失败，会返回false。
     * 可使用swoole_strerror(swoole_errno()) 得到错误码和错误信息。
     *
     * @param int $msgkey 是消息队列的key，默认会使用ftok(FILE)
     * @param int $mode 通信模式，默认为2，表示争抢模式，所有创建的子进程都会从队列中取数据
     */
    public function useQueue($msgkey = 0, $mode = 1);

    /**
     * 投递数据到消息队列中
     *
     * $data要投递的数据，长度受限与操作系统内核参数的限制。默认为8192，最大不超过65536
     * 操作失败会返回false，成功返回true
     *
     * @param string $data
     */
    public function push($data);

    /**
     * 从队列中提取数据
     *
     * @param int $maxsize
     * @return string
     */
    public function pop($maxsize = 8192);

    /**
     * 用于关闭创建的好的管道
     */
    public function close();

    /**
     * 退出子进程
     *
     * 注意: 原名是 "exit", 但作为本文, 没办法, 只能加个前缀.
     */
    public function _exit();

    /**
     * 向子进程发送信号
     *
     * 默认的信号为SIGTREM，表示终止进程。
     * $signo=0表示检测子进程是否存在，不会真的发送信号
     *
     * @param int $pid
     * @param string $signo
     */
    public static function kill($pid, $signo = SIGTREM);

    /**
     * 回收结束运行的子进程。
     * $blocking 参数可以指定是否阻塞等待，默认为阻塞
     * 操作成功会返回返回一个数组包含子进程的PID和退出状态码，
     * 如array('code' => 0, 'pid' => 15001)，失败返回false
     *
     * @param boolean $blocking
     *
     * @return array
     */
    public static function wait(bool $blocking = true);

    /**
     * 使当前进程脱变为一个守护进程
     *
     * @param boolean $nochdir 为true表示不修改当前目录。默认false表示将当前目录切换到“/”
     * @param boolean $noclose 默认false表示将标准输入和输出重定向到/dev/null
     *
     * @return boolean
     */
    public static function daemon($nochdir = false, $noclose = false);

    /**
     * 设置异步信号监听
     *
     * @param int $signo
     * @param callenable $callback
     *
     * @return boolean
     */
    public static function signal($signo, callenable $callback);
}

/**
 * 锁
 */
final class swoole_lock
{

    /**
     *
     * @param int $type 为锁的类型
     * @param string $lockfile 当类型为SWOOLE_FILELOCK时必须传入，指定文件锁的路径
     */
    public function __construct($type, $lockfile = null);

    /**
     * 加锁操作, 加锁操作。如果有其他进程持有锁，那这里将进入阻塞，直到持有锁的进程unlock
     */
    public function lock();

    /**
     * 加锁操作。与lock方法不同的是，trylock()不会阻塞，它会立即返回。
     * 当返回false时表示抢锁失败，有其他进程持有锁。返回true时表示加锁成功，此时可以修改共享变量
     */
    public function trylock();

    /**
     * 释放锁
     */
    public function unlock();

    /**
     * 加锁。lock_read方法仅可用在读写锁(SWOOLE_RWLOCK)和文件锁(SWOOLE_FILELOCK)中，表示仅仅锁定读。
     * 在持有读锁的过程中，其他进程依然可以获得读锁，可以继续发生读操作。
     * 但不能$lock->lock()或$lock->trylock()，这两个方法是获取独占锁的。
     * 当另外一个进程获得了独占锁(调用$lock->lock/$lock->trylock)时，$lock->lock_read()会发生阻塞，直到持有锁的进程释放
     */
    public function lock_read();

    /**
     * 加锁。此方法与lock_read相同，但是非阻塞的。调用会立即返回，必须检测返回值以确定是否拿到了锁。
     */
    public function trylock_read();
}

/**
 * 缓冲
 */
final class swoole_buffer
{

    /**
     * 创建一个内存对象
     * 参数$size指定了缓冲区内存的初始尺寸。
     * 当申请的内存容量不够时swoole底层会自动扩容
     *
     * @param int $size
     */
    public function __construct($size = 128);

    /**
     * 将一个字符串数据追加到缓存区末尾
     *
     * $data是要写入的数据，支持二进制内容
     *
     * @param string $data
     *
     * @return int
     */
    public function append($data);

    /**
     * $offset
     *
     * @param int $offset 表示偏移量，如果为负数，表示倒数计算偏移量
     * @param int $length 表示读取数据的长度，默认为从$offset到整个缓存区末尾
     * @param boolean $remove 表示从缓冲区的头部将此数据移除。只有$offset = 0时此参数才有效
     *              后内存并没有释放，只是底层进行了指针偏移。当销毁此对象时才会真正释放内存
     */
    public function substr($offset, $length = -1, $remove = false);

    /**
     * 清理缓存区数据
     */
    public function clear();

    /**
     * 为缓存区扩容
     * $new_size 指定新的缓冲区尺寸，必须大于当前的尺寸
     *
     * @param int $new_size
     */
    public function expand($new_size);

    /**
     * 向缓存区的任意内存位置写数据。此函数可以直接写内存。所以使用务必要谨慎，否则可能会破坏现有数据
     *
     * $data不能超过缓存区的最大尺寸。 write方法不会自动扩容
     *
     * @param int $offset
     * @param string $data
     */
    public function write($offset, $data);
}

final class swoole_table
{

    const TYPE_INT    = NULL; // 整形字段
    const TYPE_FLOAT  = NULL; // 浮点字段
    const TYPE_STRING = NULL; // 字符串字段

    /**
     * 创建内存表
     *
     * 创建对象后会创建一个Mutex锁
     * $table->lock()/$table->unlock()在创建后即可使用
     * $size参数指定表格的最大行数
     *
     * @param int $size
     */

    public function __construct($size);

    /**
     * 内存表增加一列
     *
     * $name 指定字段的名称
     * $type 指定字段类型，支持3种类型，
     * swoole_table::TYPE_INT  默认为4个字节，可以设置1，2，4，8一共4种长度
     * swoole_table::TYPE_FLOAT 会占用8个字节的内存
     * swoole_table::TYPE_STRING 字符串类型，必须要指定最大长度 设置后，set操作不能设置的值不能超过此长度
     *
     * @param string $name
     * @param int $type
     * @param int $size
     */
    public function column($name, $type, $size);

    /**
     * 创建内存表
     *
     * 创建好表的结构后，执行create后创建表
     * swoole_table 使用共享内存来保存数据，在创建子进程前，务必要执行swoole_table->create()
     * swoole_server 中使用swoole_table，swoole_table->create() 必须在swoole_server->start()前执行
     */
    public function create();

    /**
     * 设置行的数据，swoole_table使用key-value的方式来访问数据
     *
     * $key，数据的key，相同的$key对应同一行数据，如果set同一个key，会覆盖上一次的数据
     * $value，必须是一个数组，必须与字段定义的$name完全相同
     *
     * @param string $key
     * @param array $array
     */
    public function set($key, array $array);

    /**
     * 获取一行数据
     *
     * 如果$key不存在，将返回false
     *
     * @param type $key
     */
    public function get($key);

    /**
     * 删除数据 $key对应的数据不存在，将返回false
     *
     * @param string $key
     */
    public function del($key);

    /**
     * 锁定整个表
     *
     * 当多个进程同时要操作一个事务性操作时，一定要加锁，将整个表锁定。操作完成后释放锁。
     * lock() 是互斥锁，所以只能保护lock/unlock中间的代码是安全的。lock/unlock之外的操作是不能保护的
     * set/get/del操作不使用互斥锁，所以lock之后无法阻止其他进程调用这些函数
     * lock/unlock必须成对出现，否则会发生死锁，这里务必要小心
     * lock/unlock之间不应该加入太多操作，避免锁的粒度太大影响程序性能
     * lock/unlock之间的代码，应当try/catch避免抛出异常导致跳过unlock发生死锁
     *
     */
    public function lock();

    /**
     * 释放锁
     */
    public function unlock();
}

final class swoole_http_server
{

    /**
     * @param string $host
     * @param int $port
     */
    public function __construct($host, $port);

    /**
     * 注册事件回调函数，与swoole_server->on相同。swoole_http_server->on的不同之处是：
     * swoole_http_server->on不接受onConnect/onReceive回调设置
     * swoole_http_server->on 额外接受1种新的事件类型onRequest
     */
    public function on($event, callenable $callback);

    /**
     * 启动Http服务器
     * 启动后开始监听端口，并接收新的Http和WebSocket请求。
     * 使用on方法注册的事件回调，如onWorkerStart/onTimer/onShutdown等事件回调函数依然有效。
     */
    public function start();

    /**
     * 设置此选项后，
     * 服务器会自动将请求的GET、POST、COOKIE等数据设置到PHP的$_GET/$_POST/$_COOKIE等超全局变量中
     *
     * 默认为HTTP_GLOBAL_ALL表示设置所有的超全局变量
     * 此方法是为了兼容原有的代码，使用超全局变量是不良好的编码规范，不推荐使用
     * 使用超全局变量在异步非阻塞的模式下可能存在不可重入问题
     */
    public function setGlobal($flags = HTTP_GLOBAL_ALL, $flags = HTTP_GLOBAL_GET | HTTP_GLOBAL_POST);
}

final class swoole_http_request
{

    /**
     * Http请求的头部信息。类型为数组，所有key均为小写
     *
     * @var array
     */
    public $header = array();

    /**
     * Http请求相关的服务器信息，相当于PHP的$_SERVER数组。包含了Http请求的方法，URL路径，客户端IP等信息。
     * 数组的key全部为小写，并且与PHP的$_SERVER数组保持一致
     *
     * @var array
     */
    public $server = array();

    /**
     * Http请求的GET参数，相当于PHP中的$_GET，格式为数组
     *
     * @var array
     */
    public $get = array();

    /**
     * HTTP POST参数，格式为数组
     *
     * @var array
     */
    public $post = array();

    /**
     * HTTP请求携带的COOKIE信息，与PHP的$_COOKIE相同，格式为数组
     *
     * @var array
     */
    public $cookie = array();

    public function __construct();

    /**
     * 获取原始的POST包体，用于非application/x-www-form-urlencoded格式的Http POST请求。
     * string swoole_http_request->rawContent();
     * 返回原始POST数据，此函数等同于PHP的fopen('php://input')
     * 标准POST格式，无法调用此函数
     */
    public function rawContent();
}

final class swoole_http_response
{

    public function __construct();

    /**
     * 设置HTTP响应的Header信息
     *
     * @param string $key
     * @param string $value
     */
    public function header($key, $value);

    /**
     * 设置HTTP响应的cookie信息。此方法参数与PHP的setcookie完全一致
     *
     * @param string $key
     * @param string $value
     * @param int $expire
     * @param string $path
     * @param string $domain
     * @param boolean $secure
     * @param boolean $httponly
     */
    public function cookie($key, $value = '', $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = false);

    /**
     * 发送Http状态码
     *
     * @param int $http_status_code
     */
    public function status($http_status_code);

    /**
     * 启用Http GZIP压缩。压缩可以减小HTML内容的尺寸，有效节省网络带宽，提高响应时间。
     * 必须在write/end发送内容之前执行gzip，否则会抛出错误
     *
     * @param int $level
     */
    public function gzip($level = 1);

    /**
     * 启用Http Chunk分段向浏览器发送相应内容。关于Http Chunk可以参考Http协议标准文档。
     * boolean swoole_http_response->write( $data);
     * $data 要发送的数据内容，最大长度不得超过2M
     * 使用write分段发送数据后，end方法将不接受任何参数
     * 调用end方法后会发送一个长度为0的Chunk表示数据传输完毕
     *
     * @param string $data
     */
    public function write($data);

    /**
     * 发送Http响应体，并结束请求处理
     *
     * @param string $html
     */
    public function end($html);
}

final class swoole_websocket_server
{

    public function __construct();

    /**
     * onHandShake onOpen onMessage
     *
     * @param string $event
     * @param callenable $callback
     */
    public function on($event, callenable $callback);

    /**
     * 向websocket客户端连接推送数据，长度最大不得超过2M。
     * function swoole_websocket_server->push( $fd, $data, $binary = false);
     * $fd 客户端连接的ID，如果指定的$fd对应的TCP连接并非websocket客户端，将会发送失败
     * $data 要发送的数据内容
     * $binary，指定发送数据内容的格式，默认为文本。如果设置为true表示发送二进制数据
     * 发送成功返回true，发送失败返回false
     *
     * @param int $fd
     * @param string $data
     * @param boolean $binary
     */
    public function push($fd, $data, $binary = false);
}

<?php

/** 当前Swoole的版本号 */
define('SWOOLE_VERSION', '1.7.20');

/*
 * swoole_server 构造函数参数
 */

/**
 * 使用Base模式，业务代码在Reactor中直接执行
 */
define('SWOOLE_BASE', 1);

/**
 * 使用线程模式，业务代码在Worker线程中执行
 */
define('SWOOLE_THREAD', 2);

/**
 * 使用进程模式，业务代码在Worker进程中执行
 */
define('SWOOLE_PROCESS', 3);
define('SWOOLE_PACKET', 0x10);

/*
 * swoole_client 构造函数参数
 */

/**
 * 创建tcp socket
 */
define('SWOOLE_SOCK_TCP', 1);

/**
 * 创建tcp ipv6 socket
 */
define('SWOOLE_SOCK_TCP6', 3);

/**
 * 创建udp socket
 */
define('SWOOLE_SOCK_UDP', 2);

/**
 * 创建udp ipv6 socket
 */
define('SWOOLE_SOCK_UDP6', 4);

/**
 * 创建udp socket
 */
define('SWOOLE_SOCK_UNIX_DGRAM', 5);

/**
 * 创建udp ipv6 socket
 */
define('SWOOLE_SOCK_UNIX_STREAM', 6);
define('SWOOLE_SSL', 5);

/**
 * 创建tcp socket
 */
define('SWOOLE_TCP', 1);

/**
 * 创建tcp ipv6 socket
 */
define('SWOOLE_TCP6', 2);

/**
 * 创建udp socket
 */
define('SWOOLE_UDP', 3);

/**
 * 创建udp ipv6 socket
 */
define('SWOOLE_UDP6', 4);
define('SWOOLE_UNIX_DGRAM', 5);
define('SWOOLE_UNIX_STREAM', 6);

/**
 * 同步客户端
 */
define('SWOOLE_SOCK_SYNC', 0);

/**
 * 异步客户端
 */
define('SWOOLE_SOCK_ASYNC', 1);

/**
 * 同步客户端
 */
define('SWOOLE_SYNC', 0);

/**
 * 异步客户端
 */
define('SWOOLE_ASYNC', 1);

/**
 * 客户端保持长连接
 */
define('SWOOLE_KEEP', 512);

/*
 * new swoole_lock构造函数参数
 */

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
define('SWOOLE_SPINLOCK', 5);

/**
 * 创建信号量
 */
define('SWOOLE_SEM', 4);
define('SWOOLE_EVENT_WRITE', 1);
define('SWOOLE_EVENT_READ', 2);


define('HTTP_GLOBAL_ALL', 1);
define('HTTP_GLOBAL_GET', 2);
define('HTTP_GLOBAL_POST', 4);
define('HTTP_GLOBAL_COOKIE', 8);

define('WEBSOCKET_OPCODE_TEXT', 1);

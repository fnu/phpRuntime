<?php

/**
 * 创建内存表
 */
class swoole_table
{

    const TYPE_INT    = 1;
    const TYPE_STRING = 2;
    const TYPE_FLOAT  = 3;

    /**
     * 获取key
     * @param $key
     * @return array
     */
    function get($key);

    /**
     * 设置key
     * @param       $key
     * @param array $array
     */
    function set($key, array $array);

    /**
     * 删除key
     * @param $key
     * @return boolean
     */
    function del($key);

    /**
     * 原子自增操作，可用于整形或浮点型列
     * @param $key
     * @param $column
     * @param $incrby
     * @return boolean
     */
    function incr($key, $column, $incrby = 1);

    /**
     * 原子自减操作，可用于整形或浮点型列
     * @param $key
     * @param $column
     * @param $decrby
     */
    function decr($key, $column, $decrby = 1);

    /**
     * 增加字段定义
     * @param     $name
     * @param     $type
     * @param int $len
     */
    function column($name, $type, $len = 4);

    /**
     * 创建表，这里会申请操作系统内存
     * @return boolean
     */
    function create();

    /**
     * 锁定整个表
     * @return boolean
     */
    function lock();

    /**
     * 释放表锁
     * @return boolean
     */
    function unlock();
}

<?php

namespace Yaf;

/**
 * 是Yaf路由协议的标准接口,
 * 它的存在使得用户可以自定义路由协议
 */
interface Route_Interface
{

    abstract public function route();

    /**
     * 通过路由器, 生成URL
     *
     * @param array $mvc
     * @param array|null $query
     */
    abstract public function assemble(array $mvc, array $query = NULL);
}

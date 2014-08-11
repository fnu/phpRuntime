<?php

namespace Yaf;

abstract class Plugin_Abstract {

    public function routerStartup(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);

    public function routerShutdown(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);

    public function dispatchLoopStartup(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);

    public function dispatchLoopShutdown(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);

    public function preDispatch(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);

    public function postDispatch(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);

    public function preResponse(\Yaf\Request_Abstract $request, \Yaf\Response_Abstract $response);
}

<?php

namespace Yaf\Route;

final class Supervar implements \Yaf\Route_Interface {

    protected $_var_name = NULL;

    public function __construct($supervar_name);

    public function route($request);
}

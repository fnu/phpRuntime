<?php

namespace Yaf\Route {

    final class Map implements \Yaf\Route_Interface {

        protected $_ctl_router = "";
        protected $_delimeter  = NULL;

        public function __construct($controller_prefer = NULL, $delimiter = NULL);

        public function route($request);
    }

}

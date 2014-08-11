<?php

namespace Yaf;

class Route_Static implements Yaf\Route_Interface {

    public function match($uri);

    public function route($request);
}

<?php

namespace Yaf;

/**
 * 提供了一个可以定制 \Yaf\Application 的最早的时机,
 * 它相当于一段引导, 入口程序.
 *
 * 它本身没有定义任何方法.
 * 但任何继承自 \Yaf\Bootstrap 的类中的以 "_init" 开头的方法,
 * 都会在 \Yaf\Application::bootstrap 时刻被调用.
 * 调用的顺序和这些方法在类中的定义顺序相同.
 * Yaf保证这种调用顺序.
 *
 * 这些方法, 都可以接受一个 \Yaf\Dispatcher 参数.
 */
abstract class Bootstrap_Abstract {

}
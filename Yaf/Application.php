<?php

namespace Yaf;

/**
 * \Yaf\Application 代表一个产品/项目,
 * 是Yaf运行的主导者, 真正执行的主题.
 *
 * 它负责接收请求, 协调路由, 分发, 执行, 输出.
 *
 * @link http://yaf.laruence.com/manual/yaf.classes.html#yaf.class.application
 */
final class Application
{

    protected $config      = NULL;
    protected $dispatcher  = NULL;
    static protected $_app = NULL;
    protected $_modules    = NULL;
    protected $_running    = "";
    protected $_environ    = "develop";
    protected $_err_no     = "0";
    protected $_err_msg    = "";

    /**
     * 初始化一个 \Yaf\Application,
     * 如果 $config 是一个INI文件, 那么 $section 指明要读取的配置节.
     *
     * @param \Yaf\Config_Abstract $config ini配置文件
     * @param string $envrion 配置节
     */
    public function __construct($config, $envrion = NULL);

    /**
     * 运行一个 Yaf\Application, 开始接受并处理请求.
     *
     * 这个方法只能调用一次, 多次调用并不会有特殊效果.
     */
    public function run();

    /**
     * 在 \Yaf\Application的环境下,
     * 运行一个用户自定义函数过程.
     * 主要用在使用Yaf做简单的命令行脚本的时候,
     * 应用Yaf的外围环境, 比如:自动加载, 配置, 视图引擎等.
     *
     * 注意:
     * 如果需要使用Yaf的路由分发, 也就是说, 如果是需要在CLI下全功能运行Yaf, 请参看
     * @link http://yaf.laruence.com/manual/yaf.incli.html 在命令行下使用Yaf
     */
    public function execute($entry, $_ = "...");

    /**
     * 通过特殊的方式实现了单例模式,
     * 此属性保存当前实例
     *
     * @return \Yaf\Application;
     */
    public static function app();

    /**
     * 获取当前 \Yaf\Application 的环境名
     *
     * @link http://yaf.laruence.com/manual/yaf.class.application.environ.html
     *
     * @return string
     */
    public function environ();

    public function bootstrap($bootstrap = NULL);

    /**
     * 全局配置实例
     *
     * @return \Yaf\Config\Ini
     */
    public function getConfig();

    /**
     * 获取在配置文件中申明的模块
     *
     * @return array
     */
    public function getModules();

    /**
     * 获取当前的分发器
     *
     * @return \Yaf\Dispatcher
     */
    public function getDispatcher();

    /**
     * @param string $directory 应用程序的目录
     */
    public function setAppDirectory($directory);

    /**
     * 应用程序的目录
     *
     * @return string
     */
    public function getAppDirectory();

    public function getLastErrorNo();

    public function getLastErrorMsg();

    public function clearLastError();

    public function __destruct();

    private function __clone();

    private function __sleep();

    private function __wakeup();
}

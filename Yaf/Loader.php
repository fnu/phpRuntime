<?php

namespace Yaf;

/**
 * 加载器
 */
final class Loader {

    protected $_library         = NULL;
    protected $_global_library  = NULL;
    static protected $_instance = NULL;

    private function __construct();

    private function __clone();

    private function __sleep();

    private function __wakeup();

    /**
     * @param string $class_name 类名
     */
    public function autoload($class_name);

    /**
     * @return \Yaf\Loader;
     */
    public static function getInstance($local_library_path = NULL, $global_library_path = NULL);

    public function registerLocalNamespace($name_prefix);

    public function getLocalNamespace();

    public function clearLocalNamespace();

    public function isLocalName($class_name);

    /**
     * 导入一个PHP文件,
     * 因为Yaf_Loader::import只是专注于一次包含,
     * 所以要比传统的require_once性能好一些
     *
     * 要载入的文件路径,
     * 可以为绝对路径和相对路径.
     * 如果为相对路径, 则会以应用的本地类目录(ap.library)为基目录.
     *
     * @param string $file 文件路径
     */
    public static function import($file);

    public function setLibraryPath($library_path, $is_global = NULL);

    public function getLibraryPath($is_global = NULL);
}

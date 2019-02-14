<?php

use App\Exceptions\InvalidRouteException;
use App\Http\Kernel;
use App\Models\Db;
use App\Http\Router;
use Dotenv\Dotenv;

/**
 * Class App
 */
class App
{
    /**
     * @var Router
     */
    public static $router;

    /**
     * @var Db
     */
    public static $db;

    /**
     * @var Kernel
     */
    public static $kernel;

    public static function init()
    {
        Dotenv::create(ROOTPATH)->load();
        spl_autoload_register(['static', 'loadClass']);
        static::bootstrap();
        set_exception_handler(['App', 'handleException']);
    }

    public static function bootstrap()
    {
        static::$router = new Router();
        static::$kernel = new Kernel();
        static::$db = new Db();
    }

    /**
     * @param string $className
     */
    public static function loadClass(string $className)
    {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        require_once ROOTPATH . DIRECTORY_SEPARATOR . $className . '.php';
    }

    /**
     * @param Throwable $e
     * @throws InvalidRouteException
     */
    public function handleException(Throwable $e)
    {
        if ($e instanceof InvalidRouteException) {
            echo static::$kernel->launchAction('Error', 'error404', [$e]);
        } else {
            echo static::$kernel->launchAction('Error', 'error500', [$e]);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: nimda
 * Date: 29.08.2016
 * Time: 1:38
 */

/**
 * The exception class
 */
class eBoot extends Exception
 {

    const __EX_config_is_not_readable   = 1;
    const __EX_dont_set_path            = 2;
    const __EX_dont_set_core_path       = 3;


    /**
     * Class construct
     *
     * @param int $code                 Code exception
     * @param Exception $previous       Previous exception
     */

    public function __construct($code, Exception $previous = null)
     {
         $message = '';
         parent::__construct($message, $code, $previous);
     }
 };

try
 {

// Output messages disable
     ob_start();

     $time = microtime(true);
     $dir = dirname(__FILE__);
     $config = 'config.ini';

// Loading setting from config file
     if(is_readable($config)) $settings = parse_ini_file($dir.DIRECTORY_SEPARATOR.$config, true);
         else throw new eBoot(eBoot::__EX_config_is_not_readable);

// Check setting - path
     if(empty($settings['path']))
         throw new eBoot(eBoot::__EX_dont_set_path);

// Check is set the core path
     if(empty($settings['path']['__CORE__']))
         throw new eBoot(eBoot::__EX_dont_set_core_path);


 } catch(Exception $e)
    {

// Check disable output buffer
        if(ob_get_length()===false) ob_start();

// Logging exception
        $msg = $e->getMessage();
        if(!empty($msg)) $msg = ': '.$msg;
trigger_error($e->getCode().$msg);
        header("HTTP/1.x 500 Internal Server Error");
        ob_clean();
    };

?>
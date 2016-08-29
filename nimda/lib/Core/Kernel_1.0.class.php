<?php
Namespace Core;


/**
 * Created by PhpStorm.
 * User: nata
 * Date: 29.08.2016
 * Time: 3:35
 */

class Kernel
 {

    private $root_dir;
    private $settings;


    /**
     * Construct class - Kernel
     *
     * @param string $dir               Root dir
     * @param array $set                Array with settings
     */

    public function __construct($dir, array $set)
     {
         $this->root_dir = $dir;
         $this->settings = $set;
     }


    /**
     * Method for init class
     *
     * 
     */

    public function Init()
     {

     }
 }
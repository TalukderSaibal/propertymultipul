<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

/**
 * -------------------------------------------------------------------
 * AUTOLOADER CONFIGURATION
 * -------------------------------------------------------------------
 *
 * This file defines the namespaces and class maps so the Autoloader
 * can find the files as needed.
 *
 * NOTE: If you use an identical key in $psr4 or $classmap, then
 * the values in this file will overwrite the framework's values.
 */
class Autoload extends AutoloadConfig
{
    /**
     * -------------------------------------------------------------------
     * Namespaces
     * -------------------------------------------------------------------
     * This maps the locations of any namespaces in your application to
     * their location on the file system. These are used by the autoloader
     * to locate files the first time they have been instantiated.
     *
     * The '/app' and '/system' directories are already mapped for you.
     * you may change the name of the 'App' namespace if you wish,
     * but this should be done prior to creating any namespaced classes,
     * else you will need to modify all of those classes for this to work.
     *
     * Prototype:
     *```
     *   $psr4 = [
     *       'CodeIgniter' => SYSTEMPATH,
     *       'App'	       => APPPATH
     *   ];
     *```
     *
     * @var array<string, string>
     */
    public $psr4 = [
        APP_NAMESPACE => APPPATH, // For custom app namespace
        'Config'                 => APPPATH . 'Config',
        'Modules\Apartment_fund' => APPPATH . 'Modules/Apartment_fund',
        'Modules\Bill_diposit'   => APPPATH . 'Modules/Bill_diposit',
        'Modules\Committee'      => APPPATH . 'Modules/Committee',
        'Modules\Complain'       => APPPATH . 'Modules/Complain',
        'Modules\Employee'       => APPPATH . 'Modules/Employee',
        'Modules\Floor'          => APPPATH . 'Modules/Floor',
        'Modules\Demo'           => APPPATH . 'Modules/Demo',
        'Modules\Mail'           => APPPATH . 'Modules/Mail',
        'Modules\Maintenance'    => APPPATH . 'Modules/Maintenance',
        'Modules\Meeting'        => APPPATH . 'Modules/Meeting',
        'Modules\Notice'         => APPPATH . 'Modules/Notice',
        'Modules\Owner'          => APPPATH . 'Modules/Owner',
        'Modules\Rent'           => APPPATH . 'Modules/Rent',
        'Modules\Report'         => APPPATH . 'Modules/Report',
        'Modules\Setting'        => APPPATH . 'Modules/Setting',
        'Modules\Tenant'         => APPPATH . 'Modules/Tenant',
        'Modules\Unit'           => APPPATH . 'Modules/Unit',
        'Modules\User'           => APPPATH . 'Modules/User',
        'Modules\Visitor'        => APPPATH . 'Modules/Visitor',
        'Modules\Login'          => APPPATH . 'Modules/Login',
        'Modules\Home'           => APPPATH . 'Modules/Home',
        'Modules\LoginAuth'      => APPPATH . 'Modules/LoginAuth',
        'Modules\Master'         => APPPATH . 'Modules/Master',
        'Modules\Report'         => APPPATH . 'Modules/Report',
        'Modules\Setting'        => APPPATH . 'Modules/Setting',
        'Modules\Super_admin'    => APPPATH . 'Modules/Super_admin',
        'Dompdf'                 => APPPATH . 'ThirdParty/dompdf/src',
        //'Stripe' => ROOTPATH . 'vendor/stripe/stripe-php/init.php'
    ];

    /**
     * -------------------------------------------------------------------
     * Class Map
     * -------------------------------------------------------------------
     * The class map provides a map of class names and their exact
     * location on the drive. Classes loaded in this manner will have
     * slightly faster performance because they will not have to be
     * searched for within one or more directories as they would if they
     * were being autoloaded through a namespace.
     *
     * Prototype:
     *```
     *   $classmap = [
     *       'MyClass'   => '/path/to/class/file.php'
     *   ];
     *```
     *
     * @var array<string, string>
     */
    public $classmap = [];

    /**
     * -------------------------------------------------------------------
     * Files
     * -------------------------------------------------------------------
     * The files array provides a list of paths to __non-class__ files
     * that will be autoloaded. This can be useful for bootstrap operations
     * or for loading functions.
     *
     * Prototype:
     * ```
     *	  $files = [
     *	 	   '/path/to/my/file.php',
     *    ];
     * ```
     *
     * @var array<int, string>
     */
    public $files = [];
}

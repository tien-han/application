<?php
/**
 * The index.php file handles routing for the application.
 * php version 7.4.33
 *
 * @category   Index
 * @package    Index
 * @subpackage Index
 * @author     Tien Han <han.tien@student.greenriver.edu>
 * @date       5/26/2024
 * @license    No applicable license
 * @version    CVS: $Id$
 * @link       https://tienthan.greenriverdev.com/328/application/
 */

//Turn on PHP error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file (for Composer)
require_once('vendor/autoload.php');

//Require data-layer
require_once('model/data-layer.php');

//Instantiate the F3 Base class (Fat-Free)
$f3 = Base::instance();
$controller = new Controller($f3);

/**
 * Definition for default route
 */
$f3->route('GET /', function()
{
    $GLOBALS['controller']->home();
});

/**
 * Route to the form for gathering personal information
 */
$f3->route('GET|POST /application-form/personal-information', function()
{
    $GLOBALS['controller']->personalInfoForm();
});

/**
 * Route to the form for gathering experience
 */
$f3->route('GET|POST /application-form/experience', function()
{
    $GLOBALS['controller']->experienceForm();
});

/**
 * Route to the form for the mailing list checkboxes
 */
$f3->route('GET|POST /application-form/mailing-list', function()
{
    $GLOBALS['controller']->mailingListForm();
});

/**
 * Route to the summary page
 */
$f3->route('GET|POST /application-form/summary', function()
{
    $GLOBALS['controller']->summary();
});

//Run Fat-Free
$f3->run();
<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 26/06/2019
 * Time: 11:25
 */
$entityManager = require_once('bootstrap.php');

use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($entityManager);
<?php

use Spryker\Shared\Config\Application\Environment;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Propel\PropelConstants;

const APPLICATION = 'ZED';
define('APPLICATION_ROOT_DIR', dirname(__DIR__, 3));

require_once APPLICATION_ROOT_DIR . '/vendor/autoload.php';

Environment::initialize();

$config = Config::getInstance();
$config::init(APPLICATION_ENV);

return [
    'propel' => $config::get(PropelConstants::PROPEL)
];

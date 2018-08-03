<?php

use Pim\Upgrade\MongoDB\MediaMigration;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

require_once __DIR__ . '/../../../app/bootstrap.php.cache';
require_once __DIR__ . '/../../../app/AppKernel.php';
require_once __DIR__ . '/../../SchemaHelper.php';
require_once __DIR__ . '/../../UpgradeHelper.php';
require_once __DIR__ . '/../common/AbstractMediaMigration.php';
require_once __DIR__ . '/MediaMigration.php';

// TO BE LAUNCHED AFTER HAVING UPDATED THE DEPENDENCIES OF YOUR PROJECT
// NOT ABLE TO USE DOCTRINE ORM/MONGODB AS DEPENDENCIES HAVE BEEN UPDATED BUT NOT THE DATABASE AT THIS POINT
// (IE: DOCTRINE MAPPINGS HAVE CHANGED BUT NOT THE DATABASE)

/**********************************************
 * USAGE
 * repair_medias_normalized_data.php [--env environment] [--media-directory directory]
 * with:
 *      environment: your application environment (dev, prod...), default is dev
 *      directory: the directory where your product medias are located, default is %kernel.root_dir%/uploads/product/
 **********************************************/

$migration = new MediaMigration(new ConsoleOutput(), new ArgvInput($argv));

$valueTable = $migration->getSchemaHelper()->getTableOrCollection('product_value');

$migration->migrateMediasNormalizedData($valueTable);
$migration->close();

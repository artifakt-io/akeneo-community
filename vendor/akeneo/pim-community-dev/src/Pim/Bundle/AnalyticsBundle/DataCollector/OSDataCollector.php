<?php

namespace Pim\Bundle\AnalyticsBundle\DataCollector;

use Akeneo\Component\Analytics\DataCollectorInterface;

/**
 * Class OSDataCollector
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class OSDataCollector implements DataCollectorInterface
{
    /**
     * {@inheritdoc}
     */
    public function collect()
    {
        return ['os_version' => php_uname(), 'php_version' => phpversion()];
    }
}

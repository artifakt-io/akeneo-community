<?php

namespace Pim\Component\Catalog\Model;

use Akeneo\Component\Localization\Model\TranslationInterface;

/**
 * Family translation interface
 *
 * @author    Marie Bochu <marie.bochu@akeneo.com>
 * @copyright 2016 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface FamilyTranslationInterface extends TranslationInterface
{
    /**
     * Set label
     *
     * @param string $label
     *
     * @return FamilyTranslationInterface
     */
    public function setLabel($label);

    /**
     * Get the label
     *
     * @return string
     */
    public function getLabel();
}

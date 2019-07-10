<?php
/**
 * Data Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2019 w-vision AG (https://www.w-vision.ch)
 * @license    https://github.com/w-vision/ImportDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace Wvision\Bundle\DataDefinitionsBundle\Interpreter;

use Carbon\Carbon;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataSetAwareInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\DataSetAwareTrait;
use Wvision\Bundle\DataDefinitionsBundle\Model\DefinitionInterface;
use Wvision\Bundle\DataDefinitionsBundle\Model\Mapping;
use Pimcore\Model\DataObject\Concrete;

class CarbonInterpreter implements InterpreterInterface, DataSetAwareInterface
{
    use DataSetAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function interpret(Concrete $object, $value, Mapping $map, $data, DefinitionInterface $definition, $params, $configuration)
    {
        if ($value) {
            $format = $configuration['date_format'];
            if (!empty($format)) {
                return Carbon::createFromFormat($format, $value);
            }

            return new Carbon($value);
        }

        return null;
    }
}

class_alias(CarbonInterpreter::class, 'ImportDefinitionsBundle\Interpreter\CarbonInterpreter');
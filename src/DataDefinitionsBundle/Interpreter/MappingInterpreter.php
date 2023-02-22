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
 * @license    https://github.com/w-vision/DataDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace Wvision\Bundle\DataDefinitionsBundle\Interpreter;

use Wvision\Bundle\DataDefinitionsBundle\Context\InterpreterContextInterface;

class MappingInterpreter implements InterpreterInterface
{
    public function interpret(InterpreterContextInterface $context): mixed
    {
        $interpreterMap = $context->getConfiguration()['mapping'];
        $resolvedMap = [];

        if (!is_array($interpreterMap)) {
            $interpreterMap = [];
        }

        foreach ($interpreterMap as $itemMap) {
            $resolvedMap[$itemMap['from']] = $itemMap['to'];
        }

        if (array_key_exists($context->getValue(), $resolvedMap)) {
            return $resolvedMap[$context->getValue()];
        }

        if ($context->getConfiguration()['return_null_when_not_found']) {
            return null;
        }

        return $context->getValue();
    }
}

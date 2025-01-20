<?php

/**
 * This file is a part of horstoeko/zugferd.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\zugferd\exception;

use Throwable;

/**
 * Class representing an exception for unknown profile parameter
 *
 * @category Zugferd
 * @package  Zugferd
 * @author   D. Erling <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/zugferd
 */
class ZugferdUnknownProfileParameterException extends ZugferdBaseException
{
    /**
     * Constructor
     *
     * @param string         $profileParameter
     * @param Throwable|null $previous
     */
    public function __construct(string $profileParameter, ?Throwable $previous = null)
    {
        parent::__construct(sprintf("The profile parameter %s is uknown", $profileParameter), ZugferdExceptionCodes::UNKNOWNPROFILEPARAMETER, $previous);
    }
}

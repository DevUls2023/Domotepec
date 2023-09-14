<?php

/**
 * This file is part of the ramsey/collection library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Collection\Exception;

use RuntimeException;

/**
 * Thrown when attempting to operate on collections of differing types.
 */
<<<<<<< HEAD
class CollectionMismatchException extends RuntimeException
=======
class CollectionMismatchException extends RuntimeException implements CollectionException
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
{
}

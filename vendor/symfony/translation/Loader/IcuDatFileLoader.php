<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * IcuResFileLoader loads translations from a resource bundle.
 *
 * @author stealth35
 */
class IcuDatFileLoader extends IcuResFileLoader
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function load($resource, string $locale, string $domain = 'messages')
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function load(mixed $resource, string $locale, string $domain = 'messages'): MessageCatalogue
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        if (!stream_is_local($resource.'.dat')) {
            throw new InvalidResourceException(sprintf('This is not a local file "%s".', $resource));
        }

        if (!file_exists($resource.'.dat')) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $resource));
        }

        try {
            $rb = new \ResourceBundle($locale, $resource);
        } catch (\Exception $e) {
            $rb = null;
        }

        if (!$rb) {
            throw new InvalidResourceException(sprintf('Cannot load resource "%s".', $resource));
        } elseif (intl_is_failure($rb->getErrorCode())) {
            throw new InvalidResourceException($rb->getErrorMessage(), $rb->getErrorCode());
        }

        $messages = $this->flatten($rb);
        $catalogue = new MessageCatalogue($locale);
        $catalogue->add($messages, $domain);

        if (class_exists(FileResource::class)) {
            $catalogue->addResource(new FileResource($resource.'.dat'));
        }

        return $catalogue;
    }
}

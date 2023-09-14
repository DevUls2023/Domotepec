<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Catalogue;

use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\MessageCatalogueInterface;

/**
 * Base catalogues binary operation class.
 *
 * A catalogue binary operation performs operation on
 * source (the left argument) and target (the right argument) catalogues.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
abstract class AbstractOperation implements OperationInterface
{
    public const OBSOLETE_BATCH = 'obsolete';
    public const NEW_BATCH = 'new';
    public const ALL_BATCH = 'all';

    protected $source;
    protected $target;
    protected $result;

    /**
     * @var array|null The domains affected by this operation
     */
    private $domains;

    /**
     * This array stores 'all', 'new' and 'obsolete' messages for all valid domains.
     *
     * The data structure of this array is as follows:
     *
     *     [
     *         'domain 1' => [
     *             'all' => [...],
     *             'new' => [...],
     *             'obsolete' => [...]
     *         ],
     *         'domain 2' => [
     *             'all' => [...],
     *             'new' => [...],
     *             'obsolete' => [...]
     *         ],
     *         ...
     *     ]
     *
     * @var array The array that stores 'all', 'new' and 'obsolete' messages
     */
    protected $messages;

    /**
     * @throws LogicException
     */
    public function __construct(MessageCatalogueInterface $source, MessageCatalogueInterface $target)
    {
        if ($source->getLocale() !== $target->getLocale()) {
            throw new LogicException('Operated catalogues must belong to the same locale.');
        }

        $this->source = $source;
        $this->target = $target;
        $this->result = new MessageCatalogue($source->getLocale());
        $this->messages = [];
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getDomains()
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getDomains(): array
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        if (null === $this->domains) {
            $domains = [];
            foreach ([$this->source, $this->target] as $catalogue) {
                foreach ($catalogue->getDomains() as $domain) {
                    $domains[$domain] = $domain;

                    if ($catalogue->all($domainIcu = $domain.MessageCatalogueInterface::INTL_DOMAIN_SUFFIX)) {
                        $domains[$domainIcu] = $domainIcu;
                    }
                }
            }

            $this->domains = array_values($domains);
        }

        return $this->domains;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getMessages(string $domain)
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getMessages(string $domain): array
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        if (!\in_array($domain, $this->getDomains())) {
            throw new InvalidArgumentException(sprintf('Invalid domain: "%s".', $domain));
        }

        if (!isset($this->messages[$domain][self::ALL_BATCH])) {
            $this->processDomain($domain);
        }

        return $this->messages[$domain][self::ALL_BATCH];
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getNewMessages(string $domain)
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getNewMessages(string $domain): array
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        if (!\in_array($domain, $this->getDomains())) {
            throw new InvalidArgumentException(sprintf('Invalid domain: "%s".', $domain));
        }

        if (!isset($this->messages[$domain][self::NEW_BATCH])) {
            $this->processDomain($domain);
        }

        return $this->messages[$domain][self::NEW_BATCH];
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getObsoleteMessages(string $domain)
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getObsoleteMessages(string $domain): array
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        if (!\in_array($domain, $this->getDomains())) {
            throw new InvalidArgumentException(sprintf('Invalid domain: "%s".', $domain));
        }

        if (!isset($this->messages[$domain][self::OBSOLETE_BATCH])) {
            $this->processDomain($domain);
        }

        return $this->messages[$domain][self::OBSOLETE_BATCH];
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
    public function getResult()
=======
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    public function getResult(): MessageCatalogueInterface
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f
    {
        foreach ($this->getDomains() as $domain) {
            if (!isset($this->messages[$domain])) {
                $this->processDomain($domain);
            }
        }

        return $this->result;
    }

    /**
     * @param self::*_BATCH $batch
     */
    public function moveMessagesToIntlDomainsIfPossible(string $batch = self::ALL_BATCH): void
    {
        // If MessageFormatter class does not exists, intl domains are not supported.
        if (!class_exists(\MessageFormatter::class)) {
            return;
        }

        foreach ($this->getDomains() as $domain) {
            $intlDomain = $domain.MessageCatalogueInterface::INTL_DOMAIN_SUFFIX;
            switch ($batch) {
                case self::OBSOLETE_BATCH: $messages = $this->getObsoleteMessages($domain); break;
                case self::NEW_BATCH: $messages = $this->getNewMessages($domain); break;
                case self::ALL_BATCH: $messages = $this->getMessages($domain); break;
                default: throw new \InvalidArgumentException(sprintf('$batch argument must be one of ["%s", "%s", "%s"].', self::ALL_BATCH, self::NEW_BATCH, self::OBSOLETE_BATCH));
            }

            if (!$messages || (!$this->source->all($intlDomain) && $this->source->all($domain))) {
                continue;
            }

            $result = $this->getResult();
            $allIntlMessages = $result->all($intlDomain);
            $currentMessages = array_diff_key($messages, $result->all($domain));
            $result->replace($currentMessages, $domain);
            $result->replace($allIntlMessages + $messages, $intlDomain);
        }
    }

    /**
     * Performs operation on source and target catalogues for the given domain and
     * stores the results.
     *
     * @param string $domain The domain which the operation will be performed for
     */
    abstract protected function processDomain(string $domain);
}

<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Node;

/**
 * Represents a "<selector>#<id>" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class HashNode extends AbstractNode
{
<<<<<<< HEAD
    private $selector;
    private $id;
=======
<<<<<<< HEAD
    private $selector;
=======
    private NodeInterface $selector;
>>>>>>> 90e3ddc33631d40b7786e4906d9f64dd856a1066
    private string $id;
>>>>>>> 75bbd7bac1ee01ac0e3a7086264236361424330f

    public function __construct(NodeInterface $selector, string $id)
    {
        $this->selector = $selector;
        $this->id = $id;
    }

    public function getSelector(): NodeInterface
    {
        return $this->selector;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getSpecificity(): Specificity
    {
        return $this->selector->getSpecificity()->plus(new Specificity(1, 0, 0));
    }

    public function __toString(): string
    {
        return sprintf('%s[%s#%s]', $this->getNodeName(), $this->selector, $this->id);
    }
}

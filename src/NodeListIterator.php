<?php

namespace Stoatally\Dom;

use DomNodeList;
use IteratorIterator;
use LogicException;
use OutOfBoundsException;

class NodeListIterator extends IteratorIterator implements Iterator
{
    use IteratorTrait;

    private $nodes;

    public function __construct(DomNodeList $nodes)
    {
        $this->nodes = $nodes;

        parent::__construct($nodes);
    }

    public function count(): int
    {
        return $this->nodes->length;
    }

    public function offsetExists($offset)
    {
        $offset = $this->prepareOffset($offset);

        return $offset >= 0 && $offset < $this->nodes->length;
    }

    public function offsetGet($offset)
    {
        if (false === isset($this[$offset])) {
            throw new OutOfBoundsException(sprintf(
                'Offset %d is out of bounds.',
                $offset
            ));
        }

        return $this->nodes->item($this->prepareOffset($offset));
    }

    public function offsetSet($offset, $value)
    {
        throw new LogicException('NodeListIterator is immutable.');
    }

    public function offsetUnset($offset)
    {
        throw new LogicException('NodeListIterator is immutable.');
    }

    private function prepareOffset(int $offset)
    {
        if ($offset < 0) {
            return $this->nodes->length + $offset;
        }

        return $offset;
    }
}
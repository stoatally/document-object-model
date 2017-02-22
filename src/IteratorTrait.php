<?php

namespace Stoatally\DocumentObjectModel;

use DomDocument;
use DomNode;
use LogicException;
use OutOfBoundsException;

trait IteratorTrait
{
    public function getImportableNode(): DomNode
    {
        $document = $this->getDocument();
        $fragment = $document->createDocumentFragment();

        foreach ($this as $node) {
            $fragment->appendChild($node->cloneNode(true));
        }

        return $fragment;
    }

    public function getDocument(): DomDocument
    {
        try {
            return $this[0]->getDocument();
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function import($value): DomNode
    {
        try {
            return $this[0]->import($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function set($value): DomNode
    {
        try {
            return $this[0]->set($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function get(): ?string
    {
        try {
            return $this[0]->get();
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function after($value): DomNode
    {
        try {
            return $this[-1]->after($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function before($value): DomNode
    {
        try {
            return $this[0]->before($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function append($value): DomNode
    {
        try {
            return $this[0]->append($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function prepend($value): DomNode
    {
        try {
            return $this[0]->prepend($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    public function replace($value): DomNode
    {
        try {
            return $this[0]->replace($value);
        }

        catch (OutOfBoundsException $error) {
            throw $this->createEmptyIteratorException(__METHOD__);
        }
    }

    private function createEmptyIteratorException(string $method)
    {
        return new LogicException($method . ' called on an empty iterator.');
    }








    // public function duplicate(int $times)
    // {
    //     if ($times < 2) {
    //         return $this;
    //     }

    //     $results = [];

    //     foreach ($this as $item) {
    //         $results[] = $item;

    //         foreach (range(1, $times - 1) as $index) {
    //             $clone = $results[] = $item->cloneNode(true);

    //             if ($item->parentNode) {
    //                 $item->insertAfter($clone);
    //                 $item = $clone;
    //             }
    //         }
    //     }

    //     return new Iterator(new ArrayIterator($results));
    // }

    // public function fill(array $children)
    // {
    //     foreach ($this as $index => $parent) {
    //         $parent->nodeValue = null;

    //         if (isset($children[$index])) {
    //             $parent->appendChild($parent->import($children[$index]));
    //         }
    //     }
    // }
}
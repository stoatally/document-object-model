<?php

namespace Stoatally\Dom;

use DomNodeList;
use LogicException;
use OutOfBoundsException;

class NodeListIteratorTest extends IteratorTest
{
    protected function create($html)
    {
        $documentFactory = new DocumentFactory();
        $document = $documentFactory->createFromString($html);

        return [$document, new NodeListIterator($document->childNodes)];
    }

    protected function createEmpty()
    {
        $documentFactory = new DocumentFactory();
        $document = $documentFactory->createFromString('<a/>');

        return [$document, new NodeListIterator($document->documentElement->childNodes)];
    }

    public function testCreateIteratorFromNodeList()
    {
        list($document, $iterator) = $this->create('<a/><b/><c/>');

        $this->assertTrue($iterator instanceof Iterator);
        $this->assertEquals(3, count($iterator));
    }
}
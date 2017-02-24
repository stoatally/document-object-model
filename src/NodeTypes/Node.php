<?php

namespace Stoatally\Dom\NodeTypes;

interface Node
{
    public function getDocument(): Document;

    public function getChildren(): Iterator;

    public function getNode(): Node;

    public function import($value): Node;

    public function duplicate(int $times): Iterator;

    public function repeat($items, ?Callable $callback = null): Iterator;
}
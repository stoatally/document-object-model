<?php

namespace Stoatally\Dom\Nodes;

use DomText;
use DomNode;
use Stoatally\Dom\NodeTypes;

class Text implements NodeTypes\Text
{
    use NodeTypes\ChildNodeTrait;
    use NodeTypes\LibxmlNodeTrait;
    use NodeTypes\NodeTrait;
    use NodeTypes\QueryableNodeTrait;

    public function __construct(DomText $libxml)
    {
        $this->setLibxml($libxml);
    }
}
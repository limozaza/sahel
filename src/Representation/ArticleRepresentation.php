<?php

namespace App\Representation;

use App\Entity\Article;
use JMS\Serializer\Annotation as Serializer;

class ArticleRepresentation
{
    /**
     * @Serializer\Type(array<App\Entity\Article>)
     */
    public $data;

    public $meta;

    public function __construct($articles, $limit, $offset, $articlesCount, $pageCount)
    {
        $this->data = $articles;
        $this->addMeta('limit', $limit);
        $this->addMeta('pages', $pageCount);
        $this->addMeta('total_items', $articlesCount);
        $this->addMeta('offset', $offset);

    }


    public function addMeta($name, $value)
    {
        if (isset($this->meta[$name])) {
            throw new \LogicException(sprintf('This meta already exists. You are trying to override this meta, use the setMeta method instead for the %s meta.', $name));
        }

        $this->setMeta($name, $value);
    }

    public function setMeta($name, $value)
    {
        $this->meta[$name] = $value;
    }
}
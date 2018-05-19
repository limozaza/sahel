<?php

namespace App\Pagination\Filtering\Article;

class ArticleFilterDefinition
{
    private $title;
    private $content;
    private $sortByQuery;
    private $sortByArray;

    public function __construct($title, $content, $sortByQuery, $sortByArray)
    {
        $this->title = $title;
        $this->content = $content;
        $this->sortByQuery = $sortByQuery;
        $this->sortByArray = $sortByArray;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getSortByQuery()
    {
        return $this->sortByQuery;
    }

    /**
     * @return mixed
     */
    public function getSortByArray()
    {
        return $this->sortByArray;
    }
}
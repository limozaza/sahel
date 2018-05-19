<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 16/05/18
 * Time: 23:30
 */

namespace App\Pagination\Filtering\Article;


use Symfony\Component\HttpFoundation\Request;

class ArticleFilterDefinitionFactory
{
    public function factory(Request $request): ArticleFilterDefinition
    {
        return new ArticleFilterDefinition(
            $request->get('title'),
            $request->get('content')
        );
    }
}
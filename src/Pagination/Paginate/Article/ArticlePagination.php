<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 18/05/18
 * Time: 17:50
 */

namespace App\Pagination\Paginate\Article;


use App\Pagination\Filtering\Article\ArticleFilterDefinition;
use App\Pagination\Filtering\Article\ArticleRessourceFilter;
use App\Pagination\Page;
use App\Representation\Representation;
use Doctrine\ORM\UnexpectedResultException;

class ArticlePagination
{
    /**
     * @var ArticleRessourceFilter
     */
    private $articleRessourceFilter;

    public function __construct(ArticleRessourceFilter $articleRessourceFilter)
    {
        $this->articleRessourceFilter = $articleRessourceFilter;
    }

    public function paginate(Page $page, ArticleFilterDefinition $definition){
        $ressources = $this->articleRessourceFilter->getResources($definition)
            ->setFirstResult($page->getOffset())
            ->setMaxResults($page->getLimit())
            ->getQuery()
            ->getResult();

        $ressourcesCount = $pages = null;
        try{
            $ressourcesCount = $this->articleRessourceFilter->getResourcesCount($definition)
                ->getQuery()
                ->getSingleScalarResult();
            $pages = (int)ceil($ressourcesCount/ $page->getLimit());
        }catch (UnexpectedResultException $exception){

        }

        return new Representation($ressources, $page->getLimit(), $page->getPage(), $ressourcesCount, $pages);

    }
}
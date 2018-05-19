<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 16/05/18
 * Time: 23:40
 */

namespace App\Pagination\Filtering\Article;


use App\Repository\ArticleRepository;
use Doctrine\ORM\QueryBuilder;

class ArticleRessourceFilter
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param $filter
     * @return QueryBuilder
     */
    public function getResources($filter):QueryBuilder
    {
        $qb = $this->getQuery($filter);
        $qb->select('article');
        return $qb;
    }

    /**
     * @param $filter
     * @return QueryBuilder
     */
    public function getResourcesCount($filter):QueryBuilder
    {
        $qb = $this->getQuery($filter);
        $qb->select('count(article)');
        return $qb;
    }

    /**
     * @param ArticleFilterDefinition $articleFilterDefinition
     * @return QueryBuilder
     */
    private function getQuery(ArticleFilterDefinition $articleFilterDefinition): QueryBuilder
    {
        $qb = $this->articleRepository->createQueryBuilder("article");

        if(null !== $articleFilterDefinition->getTitle()){
            $qb->where(
                $qb->expr()->like('article.title', ':title')
            );
            $qb->setParameter('title', "%{$articleFilterDefinition->getTitle()}%");
        }
        if(null !== $articleFilterDefinition->getContent()){
            $qb->where(
                $qb->expr()->like('article.content', ':content')
            );
            $qb->setParameter('title', "%{$articleFilterDefinition->getContent()}%");
        }
        return $qb;
    }
}
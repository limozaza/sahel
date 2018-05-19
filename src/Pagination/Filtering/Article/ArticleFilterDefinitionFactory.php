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
    private const ACEPTED_SORT_FIELDS = ['id','title','content'];
    public function factory(Request $request): ArticleFilterDefinition
    {
        return new ArticleFilterDefinition(
            $request->get('title'),
            $request->get('content'),
            $request->get('sortBy'),
            $this->sortQueryToArray($request->get('sortBy'))
        );
    }

    private function sortQueryToArray(?string $sortByQuery): ?array
    {
        if(null === $sortByQuery)
        {
            return null;
        }

        return
        array_intersect_key(
            array_reduce(
                explode(',', $sortByQuery),
                function ($carry, $item){
                    list($by, $order) = array_replace(
                        [1 => 'desc'],
                        explode(
                            ' ',
                            preg_replace('/\s+/', ' ', $item)
                        )
                    );
                    $carry[$by] = $order;

                    return $carry;
                },
                []
            ),
            array_flip(self::ACEPTED_SORT_FIELDS)
        );

    }
}
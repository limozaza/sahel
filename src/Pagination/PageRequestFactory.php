<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 16/05/18
 * Time: 22:59
 */

namespace App\Pagination;


use Symfony\Component\HttpFoundation\Request;

class PageRequestFactory
{
    private const KEY_LIMIT = 'limit';
    private const KEY_PAGE = 'page';
    private const DEFAULT_LIMIT = 3;
    private const DEFAULT_PAGE = 1;

    public function fromRequest(Request $request)
    {
        $limit = $request->get(self::KEY_LIMIT, self::DEFAULT_LIMIT);
        $page = $request->get(self::KEY_PAGE, self::DEFAULT_PAGE);

        return new Page($page, $limit);
    }
}
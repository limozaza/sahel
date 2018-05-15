<?php

namespace App\Representation;


use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;

class Pagination
{
    private const KEY_LIMIT = 'limit';
    private const KEY_PAGE = 'page';
    private const DEFAULT_LIMIT = 3;
    private const DEFAULT_PAGE = 1;

    /**
     * @var RegistryInterface
     */
    private $registry;


    public function __construct(RegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    public function paginate(Request $request, string  $entityName, array $criteria)
    {
        $limit = $request->get(self::KEY_LIMIT, self::DEFAULT_LIMIT);
        $page = $request->get(self::KEY_PAGE, self::DEFAULT_PAGE);
        $offset = ($page -1)* $limit;

        $repository = $this->registry->getRepository($entityName);
        $ressources = $repository->findBy($criteria, null, $limit, $offset);

        $ressourcesCount = $repository->count([]);
        $pageCount = (int)ceil($ressourcesCount/ $limit);
        $collection = new Representation($ressources, $limit, $page, $ressourcesCount, $pageCount);

        return $collection;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 23/05/18
 * Time: 23:26
 */

namespace App\DataFixtures;


use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadMovieData extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $movie1 = new Movie();
        $movie1->setTitle("Titanic");
        $movie1->setYear(1996);
        $movie1->setTime(189);
        $movie1->setDescription("just description Titanic Film");

        $manager->persist($movie1);
        $manager->flush();
    }
}
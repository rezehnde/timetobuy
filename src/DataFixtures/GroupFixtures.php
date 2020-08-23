<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $group = new Group();
        $group->setName('Euro');
        $group->setApiUrl('https://api.exchangeratesapi.io/history?start_at=2020-01-01&end_at=2020-06-30');
        $manager->persist($group);

        $group = new Group();
        $group->setName('U.S. Dollar');
        $group->setApiUrl('https://api.exchangeratesapi.io/history?start_at=2020-01-01&end_at=2020-06-30&base=USD');
        $manager->persist($group);

        $group = new Group();
        $group->setName('Japanese Yen');
        $group->setApiUrl('https://api.exchangeratesapi.io/history?start_at=2020-01-01&end_at=2020-06-30&base=JPY');
        $manager->persist($group);

        $manager->flush();
    }
}

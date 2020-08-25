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
        $group->setName('Euro x U.S. Dollar');
        $group->setApiUrl('USD');
        $manager->persist($group);

        $group = new Group();
        $group->setName('Euro x Brazilian Real');
        $group->setApiUrl('BRL');
        $manager->persist($group);

        $group = new Group();
        $group->setName('Euro x Japanese Yen');
        $group->setApiUrl('JPY');
        $manager->persist($group);

        $manager->flush();
    }
}

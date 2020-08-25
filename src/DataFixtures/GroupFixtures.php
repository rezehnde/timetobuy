<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\UserRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\UserFixtures;

class GroupFixtures extends Fixture implements DependentFixtureInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function load(ObjectManager $manager)
    {
        $group = new Group();
        $group->setName('Euro x U.S. Dollar');
        $group->setCurrency('USD');
        $manager->persist($group);
        $user = $this->userRepository->findByEmail('admin@rezehnde.com');
        if ($user) {
            $user->addGroup($group);
            $manager->persist($user);
        }

        $group = new Group();
        $group->setName('Euro x Brazilian Real');
        $group->setCurrency('BRL');
        $manager->persist($group);
        if ($user) {
            $user->addGroup($group);
            $manager->persist($user);
        }

        $group = new Group();
        $group->setName('Euro x Japanese Yen');
        $group->setCurrency('JPY');
        $manager->persist($group);
        $user = $this->userRepository->findByEmail('user@rezehnde.com');
        if ($user) {
            $user->addGroup($group);
            $manager->persist($user);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }    
}

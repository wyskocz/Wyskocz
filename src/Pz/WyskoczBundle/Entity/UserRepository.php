<?php // src/Pz/WyskoczBundle/Entity/UserRepository.php
namespace Pz\WyskoczBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return true;
    }
}
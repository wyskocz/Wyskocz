<?php

namespace Pz\WyskoczBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pz\WyskoczBundle\Entity\Place;

class PlaceFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        
        $data = unserialize(file_get_contents('http://localhost/puby.php'));
        
        $i = 0;
        foreach($data as $place):
            
            $entry[$i] = new Place();
            $entry[$i]->setName($place->name);
            $entry[$i]->setType($place->type);
            $entry[$i]->setDescription($i.' Tymczasowy opis ');
            $entry[$i]->setLocation($place->location);
            $entry[$i]->setEtc($place->etc);
            $manager->persist($entry[$i]);
            $i++;
            
        endforeach;

        $manager->flush();
    }

}
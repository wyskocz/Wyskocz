<?php

namespace Pz\WyskoczBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PlaceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlaceRepository extends EntityRepository
{
    
    public function getPlaces()
    {
        $places = $this->findAll();
        
        $result = array('type' => 'FeatureCollection', 'features' => array());
        foreach($places as $place):
            $result['features'][] = array(
              'type' => 'Feature',
              'properties' => array (
                  '@id' => $place->getId(),
                  'name' => $place->getName(),
                  'amenity' => $place->getType(),
                  'description' => $place->getDescription(),
                  'etc' => json_decode($place->getEtc())
              ),
              'geometry' => json_decode($place->getLocation()),
              
            );
        endforeach;
        
        return ($result);
    }
}
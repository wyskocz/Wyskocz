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

        $query = $this->getEntityManager()->createQuery('
                SELECT p, AVG(v.value) FROM WyskoczBundle:Place p
                LEFT JOIN WyskoczBundle:Vote v WITH v.contentId = p.id
                GROUP BY p.id
                ORDER BY p.id
            ');

        
        $result = $query->getResult();
        foreach($result as $place) {
            if($place[1] === NULL) $place[1] = 0;
            $place[0]->setVoteValue( round($place[1],2) );
            $places[] = $place[0];
        }

        $result = array(
                'json' => array('type' => 'FeatureCollection', 'features' => array()),
                'raw' => $places
                );
        foreach($places as $place):
            $result['json']['features'][] = array(
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
    
    public function getPlace($id)
    {
        $place = $this->find($id);
        $result = array(
            'raw' => $place,
            'location' => json_decode($place->getLocation())->coordinates
        );
        
        return $result;
    }
    
}

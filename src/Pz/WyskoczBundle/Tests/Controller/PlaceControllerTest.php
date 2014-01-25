<?php

namespace Pz\WyskoczBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PlaceControllerTest extends WebTestCase
{
    
    public function testCompleteScenario()
    {/*
     * 
     
        // Create a new client to browse the application
        $client = static::createClient();

        // STRONA GŁÓWNA
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        // MIEJSCA
        $crawler = $client->click($crawler->selectLink('Lista miejsc')->link());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        // KONKRETNE MIEJSCE
        $crawler = $client->click($crawler->selectLink('1')->link());
        $this->assertGreaterThan(0, $crawler->filter('h3')->count());
            
            //Sprawdzam czy mapka jest
            $mapka = array(
                'tag' => 'div',
                'id' => 'map'
            );
            $this->assertTag($mapka, $client->getResponse()->getContent());
        
         
        // Create a new entry in the database   
        /*
        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'pz_wyskoczbundle_placetype[field_name]'  => 'Test',
            // ... other fields to fill
        ));
        
        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Edit')->form(array(
            'pz_wyskoczbundle_placetype[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    
         * 
         */
    }
    
}

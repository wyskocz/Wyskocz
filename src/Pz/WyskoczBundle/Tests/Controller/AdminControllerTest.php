<?php

namespace Pz\WyskoczBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    
    public function testCompleteScenario()
    {
        /*
        // Create a new client to browse the application
        $client = static::createClient();
        //$this->doLogin();
        // STRONA GŁÓWNA
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        // LOGOWANIE
        $form = $crawler->selectButton('Zaloguj')->form(array(
            '_username'  => 'admin',
            '_password' => '123'
        ));
        $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());

        $crawler = $client->followRedirect();
        
        var_dump($client->getResponse()->getContent());
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        

        
        $crawler = $client->click($crawler->selectLink('Panel')->link());
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    
         * }
         */
    }
}

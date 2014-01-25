<?php

namespace Pz\WyskoczBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class VoteControllerTest extends WebTestCase
{
    public function testCompleteScenario()
    {
        $client = static::createClient();
        // STRONA GŁÓWNA
        $crawler = $client->request('POST', '/vote/', array(
            'vote' => array(
                "value" => 1,
                "contentId" => 1,
                "contentType" => 1,
                "userId" => 3
                ))
            );
    }
}

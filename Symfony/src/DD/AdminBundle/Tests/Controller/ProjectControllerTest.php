<?php

namespace DD\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjectControllerTest extends WebTestCase
{
    public function testAll()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/all');
    }

}

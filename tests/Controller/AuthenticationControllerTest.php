<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationControllerTest extends WebTestCase
{
    public function testUri()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testButtonSubmit()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(1, $crawler->filter('button[type=submit]')->count());
    } 
    public function testInputEmail()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(1, $crawler->filter('input[id=username]')->count());
    } 
    public function testInputPassword()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(1, $crawler->filter('input[id=password]')->count());
    }  
    public function testInputEmailEmpty()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());    
        $buttonCrawlerNode = $crawler->selectButton('Login');
        $form = $buttonCrawlerNode->form();
        $form = $buttonCrawlerNode->form(array(
            '_username'  => '',
            '_password'  => 'password_correct',
        ));
        $crawler = $client->submit($form);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains("Error",$crawler->filter('div#error')->first()->text());
    }            
}
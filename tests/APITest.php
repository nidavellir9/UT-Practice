<?php

use GuzzleHttp\Client;

class APITest extends \PHPUnit\Framework\TestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client = new Client();
    }

    public function tearDown(): void
    {
        unset($this->client);
    }

    public function testEndpointGet()
    {
        $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts/1');

        $data = json_decode($response->getBody(), true);

        $this->assertArrayHasKey('userId', $data);
        $this->assertArrayHasKey('title', $data);
    }

    public function testEndpointGetErroneo()
    {
        $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts/101', [
            "http_errors" => false
        ]);

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testEndpointPost()
    {
        $response = $this->client->request('POST', 'https://jsonplaceholder.typicode.com/posts', [
            "userId" => 1,
            "title" => "Mi titulo",
            "body" => "Mi contenido"
        ]);

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals(101, $data['id']);
    }

    public function testEndpointDelete()
    {
        $response = $this->client->request('DELETE', 'https://jsonplaceholder.typicode.com/posts/1');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testEndpointPut()
    {
        $response = $this->client->request('PUT', 'https://jsonplaceholder.typicode.com/posts/1', [
            "title" => "Mi titulo Put"
        ]);

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $data['id']);
    }

    public function testEndpointPatch()
    {
        $response = $this->client->request('PATCH', 'https://jsonplaceholder.typicode.com/posts/1', [
            "title" => "Mi titulo Patch"
        ]);

        $data = json_decode($response->getBody(), true);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(1, $data['id']);
    }
}
?>
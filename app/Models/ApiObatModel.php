<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\CURLRequest;

class ApiObatModel extends Model
{
    protected $Url; // Base URL for the API
    protected $client;  // CURLRequest instance

    public function __construct()
    {
        $this->Url = 'http://localhost:8081/api/obat';
        $this->client = \Config\Services::curlrequest();
    }

    public function listObat()
    {
        $response = $this->client->request('GET', $this->Url);
        return json_decode($response->getBody(), true);
    }

    public function getObat($id)
    {
        $response = $this->client->request('GET', "{$this->Url}/{$id}");
        return json_decode($response->getBody(), true);
    }

    public function inputObat($data)
    {
        $response = $this->client->request('POST', $this->Url, [
            'json' => $data,
        ]);
        return $response;
    }

    public function updateObat($id, $data)
    {
        $response = $this->client->request('PUT', "{$this->Url}/{$id}", [
            'json' => $data,
        ]);
        return $response;
    }

    public function deleteObat($id)
    {
        $response = $this->client->request('DELETE', "{$this->Url}/{$id}");
        return $response;
    }
}
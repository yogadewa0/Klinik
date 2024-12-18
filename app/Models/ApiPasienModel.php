<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\CURLRequest;

class ApiPasienModel extends Model
{
    protected $Url; // Base URL for the API
    protected $client;  // CURLRequest instance

    public function __construct()
    {
        $this->Url = 'http://localhost:8081/api/pasien';
        $this->client = \Config\Services::curlrequest();
    }

    public function listPasien()
    {
        $response = $this->client->request('GET', $this->Url);
        return json_decode($response->getBody(), true);
    }

    public function getPasien($id)
    {
        $response = $this->client->request('GET', "{$this->Url}/{$id}");
        return json_decode($response->getBody(), true);
    }

    public function inputPasien($data)
    {
        $response = $this->client->request('POST', $this->Url, [
            'json' => $data,
        ]);
        return $response;
    }

    public function updatePasien($id, $data)
    {
        $response = $this->client->request('PUT', "{$this->Url}/{$id}", [
            'json' => $data,
        ]);
        return $response;
    }

    public function deletePasien($id)
    {
        $response = $this->client->request('DELETE', "{$this->Url}/{$id}");
        return $response;
    }
}
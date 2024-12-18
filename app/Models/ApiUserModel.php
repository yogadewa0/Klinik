<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiUserModel extends Model
{
    protected $Url;

    public function __construct()
    {
        $this->Url = 'http://localhost:8081/api';
    }

    public function login($data)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', $this->Url . '/users/login', [
            'json' => $data,
        ]);
        return json_decode($response->getBody(), true);
    }

    public function getUser($id_user)
    {
        $client = \Config\Services::curlrequest();
        $response = $this->client->request('GET', $this->Url . '/users/' . $id_user);

        return json_decode($response->getBody(), true);
    }

    public function editUser($id, $data)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('PUT', $this->Url . '/users/' . $id, [
            'json' => $data,
        ]);
        return json_decode($response->getBody(), true);
    }

    public function logout()
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', $this->Url . '/users/logout');
        return json_decode($response->getBody(), true);
    }
}
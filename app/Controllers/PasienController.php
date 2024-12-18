<?php

namespace App\Controllers;

use App\Models\ApiPasienModel;

class PasienController extends BaseController
{
    protected $apiPasienModel;

    public function __construct()
    {
        $this->apiPasienModel = new ApiPasienModel();
    }

    public function index()
    {
        $data['pasien'] = $this->apiPasienModel->listPasien();
        return view('admin/Pasien/delete_pasien', $data);
    }

    public function create()
    {
        if ($this->request->getPost() != null) {
            $data = $this->request->getPost();
            $response = $this->apiPasienModel->inputPasien($data);

            if ($response->getStatusCode() === 201) {
                return $this->response->redirect(site_url('/users-list'));
            }
        }
        return view('admin/Pasien/add_pasien');
    }

    public function edit($id_pasien)
    {
        $data['user_obj'] = $this->apiPasienModel->getPasien($id_pasien);
        return view('admin/Pasien/edit_pasien', $data);
    }

    public function update()
    {
        if ($this->request->getPost() != null) {
            $data = $this->request->getPost();
            $id_pasien = $this->request->getVar('id_pasien');
            $response = $this->apiPasienModel->updatePasien($id_pasien, $data);

            if ($response->getStatusCode() === 200) {
                return $this->response->redirect(site_url('/users-list'));
            }
        }
    }

    public function delete($id)
    {
        $this->apiPasienModel->deletePasien($id);
        return $this->response->redirect(site_url('/users-list'));
    }
}
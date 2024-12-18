<?php

namespace App\Controllers;

use App\Models\ApiObatModel;

class ObatController extends BaseController
{
    protected $apiObatModel;

    public function __construct()
    {
        $this->apiObatModel = new ApiObatModel();
    }

    public function index()
    {
        $data['obat'] = $this->apiObatModel->listObat();
        return view('admin/Obat/delete_obat', $data);
    }

    public function create()
    {
        if ($this->request->getPost() != null) {
            $data = $this->request->getPost();
            $response = $this->apiObatModel->inputObat($data);

            if ($response->getStatusCode() === 201) {
                return $this->response->redirect(site_url('/obat-list'));
            }
        }
        return view('admin/Obat/add_obat');
    }

    public function edit($id)
    {
        $data['obat_obj'] = $this->apiObatModel->getObat($id);
        return view('admin/Obat/edit_obat', $data);
    }

    public function update()
    {
        if ($this->request->getPost() != null) {
            $data = $this->request->getPost();
            $id = $this->request->getVar('kodeobat');
            $response = $this->apiObatModel->updateObat($id, $data);

            if ($response->getStatusCode() === 200) {
                return $this->response->redirect(site_url('/obat-list'));
            }
        }
    }

    public function delete($id)
    {
        $this->apiObatModel->deleteObat($id);
        return $this->response->redirect(site_url('/obat-list'));
    }
}
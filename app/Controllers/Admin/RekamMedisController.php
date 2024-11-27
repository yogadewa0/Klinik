<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\RekamMedis;

class RekamMedisController extends BaseController
{
    // Menampilkan daftar rekam medis
    public function index(){
        $rekamMedisModel = new RekamMedisModel();
        $data['rekam_medis'] = $rekamMedisModel->orderBy('tgl_kunjungan', 'DESC')->findAll();
        return view('admin/RekamMedis/delete_rekammedis', $data);
    }

    // Menampilkan form tambah rekam medis
    public function create(){
        return view('admin/RekamMedis/add_rekammedis');
    }

    // Menyimpan data rekam medis baru
    public function store(){
        $rekamMedisModel = new RekamMedisModel();
        $data = [
            'id_rekam_medis' => $this->request->getVar('id_rekam_medis'),
            'id_pasien'      => $this->request->getVar('id_pasien'),
            'tgl_kunjungan'  => $this->request->getVar('tgl_kunjungan'),
            'diagnosa'       => $this->request->getVar('diagnosa'),
            'penanganan'     => $this->request->getVar('penanganan'),
            'id_user'        => $this->request->getVar('id_user'),
        ];
        $rekamMedisModel->insert($data);
        return $this->response->redirect(site_url('/rekammedis-list'));
    }

    // Show single obat
    public function singleRekaMedis($id = null){
        $rekamMedisModel = new RekamMedisModel();
        $data['rekammedis_obj'] = $rekamMedisModel->where('id_rekam_medis', $id)->first();
        return view('admin/RekamMedis/edit_rekammedis', $data);
    }

    // Memperbarui data rekam medis
    public function update(){
        $rekamMedisModel = new RekamMedisModel();
        $id = $this->request->getVar('id_rekam_medis');
        $data = [
            'id_pasien'      => $this->request->getVar('id_pasien'),
            'tgl_kunjungan'  => $this->request->getVar('tgl_kunjungan'),
            'diagnosa'       => $this->request->getVar('diagnosa'),
            'penanganan'     => $this->request->getVar('penanganan'),
            'id_user'        => $this->request->getVar('id_user'),
        ];
        $rekamMedisModel->update($id, $data);
        return $this->response->redirect(site_url('/rekammedis-list'));
    }

    // Menghapus data rekam medis
    public function delete($id = null){
        $rekamMedisModel = new RekamMedisModel();
        $data['rekam_medis'] = $obatModel->where('id_rekam_medis', $id)->delete($id);
        return $this->response->redirect(site_url('/rekammedis-list'));
    }    
}

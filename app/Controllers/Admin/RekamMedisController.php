<?php
namespace App\Controllers\Admin;

use App\Models\RekamMedis;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class RekamMedisController extends ResourceController{
    use ResponseTrait;

    public function show($id=null){
        $model = new RekamMedis;
        $data = $model->find($id);

        return $this-> respond($data);
    }
}
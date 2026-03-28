<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProveedorModel;

class Proveedor extends BaseController
{
    public function index(): string
    {
        $proveedor = new ProveedorModel();
        $data = [
            'header'      => view('Partials/header'),
            'proveedores' => $proveedor->findAll(),
            'footer'      => view('Partials/footer'),
        ];
        return view('Modulos/proveedores/index', $data);
    }

    public function create(): string
    {
        $data = [
            'header' => view('Partials/header'),
            'footer' => view('Partials/footer'),
        ];
        return view('Modulos/proveedores/registrarProveedor', $data);
    }

    public function registrarProveedor()
    {
        $proveedor = new ProveedorModel();
        $proveedor->insert([
            'razon_social'  => $this->request->getPost('razon_social'),
            'direccion'     => $this->request->getPost('direccion'),
            'ruc'           => $this->request->getPost('ruc'),
            'telefono'      => $this->request->getPost('telefono'),
            'representante' => $this->request->getPost('representante'),
        ]);
        return redirect()->to('/proveedores');
    }

    public function editar($id)
    {
        $proveedor = new ProveedorModel();
        $data = [
            'header'     => view('Partials/header'),
            'proveedor'  => $proveedor->find($id),
            'footer'     => view('Partials/footer'),
        ];
        return view('Modulos/proveedores/editarProveedor', $data);
    }

    public function actualizar($id)
    {
        $proveedor = new ProveedorModel();
        $proveedor->update($id, [
            'razon_social'  => $this->request->getPost('razon_social'),
            'direccion'     => $this->request->getPost('direccion'),
            'ruc'           => $this->request->getPost('ruc'),
            'telefono'      => $this->request->getPost('telefono'),
            'representante' => $this->request->getPost('representante'),
        ]);
        return redirect()->to('/proveedores');
    }

    public function eliminar($id)
    {
        $proveedor = new ProveedorModel();
        $proveedor->delete($id);
        return redirect()->to('/proveedores');
    }
}
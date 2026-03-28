<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductoModel;

class Producto extends BaseController
{
    /**
     * Retorna la vista con los datos de productos
     */
    public function index(): string
    {
        $producto = new ProductoModel();
        $data = [
            'header'    => view('Partials/header'),
            'productos' => $producto->findAll(),
            'footer'    => view('Partials/footer'),
        ];
        return view('Modulos/productos/index', $data);
    }

    /**
     * Retorna la vista de registro
     */
    public function create(): string
    {
        $data = [
            'header' => view('Partials/header'),
            'footer' => view('Partials/footer'),
        ];
        return view('Modulos/productos/registrarProducto', $data);
    }

    /**
     * Guarda un nuevo producto
     */
    public function registrarProducto()
    {
        $producto = new ProductoModel();
        $producto->insert([
            'tipo'        => $this->request->getPost('tipo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
        ]);
        return redirect()->to('/productos');
    }

    /**
     * Muestra el formulario de edición
     */
    public function editar($id)
    {
        $producto = new ProductoModel();
        $data = [
            'header'   => view('Partials/header'),
            'producto' => $producto->find($id),
            'footer'   => view('Partials/footer'),
        ];
        return view('Modulos/productos/editarProducto', $data);
    }

    /**
     * Actualiza los datos del producto
     */
    public function actualizar($id)
    {
        $producto = new ProductoModel();
        $producto->update($id, [
            'tipo'        => $this->request->getPost('tipo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio'      => $this->request->getPost('precio'),
            'stock'       => $this->request->getPost('stock'),
        ]);
        return redirect()->to('/productos');
    }

    /**
     * Elimina un producto
     */
    public function eliminar($id)
    {
        $producto = new ProductoModel();
        $producto->delete($id);
        return redirect()->to('/productos');
    }
}
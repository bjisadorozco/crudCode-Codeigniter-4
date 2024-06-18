<?php

namespace App\Controllers;

use App\Models\CrudModel;

class Crud extends BaseController
{
    public function index(): string
    {
        $Crud = new CrudModel(); // instanciamos el modelo
        $datos = $Crud->listarNombres(); // llamamos al método listar del modelo
        $mensaje = session('mensaje'); //este msj guarda lo que se haya creado a partir de la redireccion
        $data = [
            "datos" => $datos,
            "mensaje" => $mensaje
        ];

        return view('listado', $data);
    }

    public function crear()
    {
        //print_r($_POST); Para imprimir que los datos estan llegando
        $datos = [
            "nombre" => $_POST['nombre'],
            "paterno" => $_POST['paterno'],
            "materno" => $_POST['materno'],
        ];
        $Crud = new CrudModel(); // instanciamos el modelo
        $respuesta = $Crud->insertar($datos); //le mandamos los datos al metodo insertar
        if ($respuesta > 0) {
            return redirect()->to(base_url() . '/')->with('mensaje', '1');
        } else {
            return redirect()->to(base_url() . '/')->with('mensaje', '0');
        }
    }

    public function actualizar()
    {
        $datos = [
            "nombre" => $_POST['nombre'],
            "paterno" => $_POST['paterno'],
            "materno" => $_POST['materno'],
        ]; //recibimos todos los parametros
        $idNombre = $_POST["idNombre"];
        $Crud = new CrudModel(); // instanciamos el modelo
        $respuesta = $Crud->actualizar($datos, $idNombre);
        if ($respuesta) {
            return redirect()->to(base_url() . '/')->with('mensaje', '2');
        } else {
            return redirect()->to(base_url() . '/')->with('mensaje', '3');
        }
    }

    public function obtenerNombre($idNombre)
    {
        $data = ["id_nombre" => $idNombre];
        $Crud = new CrudModel(); // instanciamos el modelo
        $respuesta = $Crud->obtenerNombre($data);
        $datos = ["datos" => $respuesta];
        return view("actualizar", $datos);
    }
    public function eliminar($idNombre)
    {
        $Crud = new CrudModel();
        $data = ["id_nombre" => $idNombre];
        $respuesta = $Crud->eliminar($data);
        if ($respuesta) {
            return redirect()->to(base_url() . '/')->with('mensaje', '4');
        } else {
            return redirect()->to(base_url() . '/')->with('mensaje', '5');
        }
    }
}

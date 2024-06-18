<?php

namespace App\Models; //definiendo el espacio de nombres

use CodeIgniter\Model;

class CrudModel extends Model
{
    public function listarNombres()
    {
        $Nombres = $this->db->query("SELECT * FROM t_personas"); //objeto
        return $Nombres->getResult();
    }

    public function insertar($datos)
    {
        $Nombres = $this->db->table('t_personas');
        $Nombres->insert($datos); //realizamos la insercion con query builder

        return $this->db->insertID(); //regresar el ultimo id que hayamos generado  
    }

    public function obtenerNombre($data)
    {
        $Nombres = $this->db->table('t_personas');
        $Nombres->where($data);
        return $Nombres->get()->getResultArray();
    }

    public function actualizar($data, $idNombre)
    {
        $Nombres = $this->db->table('t_personas');
        $Nombres->set($data);
        $Nombres->where('id_nombre', $idNombre);
        return $Nombres->update();
    }

    public function eliminar($data)
    {
        $Nombres = $this->db->table('t_personas');
        $Nombres->where($data);
        return $Nombres->delete();
    }
}

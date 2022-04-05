<?php
namespace src\models;

use Exception;
use \core\Model;

class Todo extends Model {

    public function getListByKey( string $key, $value ): array
    {
        return $this->select()->where($key, $value)->execute();
    }

    public function salvarTodo( string $description, int $checked, int $idUser ): void
    {
        $this->insert([
            'description' => $description,
            'checked' => $checked,
            'idUser' => $idUser
        ])->execute();
    }

    public function excluirTodo( $id, $idUser ): void
    {
        $this->delete()->where([
            'id' => $id,
            'idUser' => $idUser
        ])->execute();
    }

    public function selecionarTodo( $id, $checked ): void
    {
        $this->update(['checked'=> $checked])
            ->where(['id' => $id])
            ->execute();
    }
}
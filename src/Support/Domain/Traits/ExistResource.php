<?php

namespace Src\Support\Domain\Traits;

trait ExistResource
{
    public function existResource($model, $id): bool
    {
        $this->code = 102;
        $this->message = "El recurso que desea acceder no está disponible, fue eliminado o ya no existe en la base de datos.";
        $object = $model::find($id);
        if (is_null($object)) {
            return false;
        }
        return $object->state == 1;
    }
}

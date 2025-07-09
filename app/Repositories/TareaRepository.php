<?php

namespace App\Repositories;

use App\Models\Tarea;

class TareaRepository
{
    public function create(array $data): Tarea
    {
        return Tarea::create($data);
    }

    public function update(int $id, array $data): ?Tarea
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return null;
        }

        $tarea->update($data);

        return $tarea;
    }
}

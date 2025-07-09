<?php

namespace App\Services;

use App\Repositories\TareaRepository;
use App\Models\Tarea;

class TareaService
{
    protected TareaRepository $tareaRepository;

    public function __construct(TareaRepository $tareaRepository)
    {
        $this->tareaRepository = $tareaRepository;
    }

    public function store(array $data): Tarea
    {
        return $this->tareaRepository->create($data);
    }

    public function update(int $id, array $data): ?Tarea
    {
        return $this->tareaRepository->update($id, $data);
    }
}

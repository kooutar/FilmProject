<?php

namespace App\Repositories\Interfeces;

interface ReservationInterface
{
    public function all();
    public function findById($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}

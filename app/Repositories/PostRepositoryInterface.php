<?php

namespace App\Repositories;


interface PostRepositoryInterface
{
    public function getAll();
    public function search($term);
    public function findBySlug($slug);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}

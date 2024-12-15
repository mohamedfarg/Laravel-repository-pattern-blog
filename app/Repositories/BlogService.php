<?php
namespace App\Repositories;

use App\Repositories\PostRepositoryInterface;

class BlogService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts($search = null)
    {
        if ($search) {
            return $this->postRepository->search($search);
        }
        return $this->postRepository->getAll();
    }

    public function getPostBySlug($slug)
    {
        return $this->postRepository->findBySlug($slug);
    }

    public function getPostById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function createPost($data)
    {
        return $this->postRepository->create($data);
    }

    public function updatePost($id, $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }
}

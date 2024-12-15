<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        return Post::all();
    }
    public function search($term)
    {
        return Post::where('title', 'like', "%$term%")
                   ->orWhere('content', 'like', "%$term%")
                   ->get();
    }
    public function findBySlug($slug)
    {
        return Post::where('slug', $slug)->firstOrFail();
    }

    public function findById($id)
    {
        return Post::findOrFail($id);
    }

    public function create(array $data)
    {
        // Validate incoming data
        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|unique:posts,slug|string|max:255', // Slug is optional, but unique if provided
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            // Optionally, throw a validation exception or return errors
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    
        // Check if 'slug' exists in the data array, if not generate a random slug
        if (!isset($data['slug']) || empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title'] ?? 'post-' . uniqid(), '-');
        }
    
        // Create and return the new post
        return Post::create($data);
    }
    
    public function update($id, array $data)
    {
        $post = Post::findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return $post;
    }
}

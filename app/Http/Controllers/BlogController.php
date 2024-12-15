<?php
namespace App\Http\Controllers;

use App\Repositories\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    // News feed page - All posts
    public function index(Request $request)
    {
        $search = $request->get('search');
        $posts = $this->blogService->getAllPosts($search);
        return view('blog.index', compact('posts'));
     
    }

    // Detailed view of a single post
    public function show($slug)
    {
        $post = $this->blogService->getPostBySlug($slug);
        return view('blog.show', compact('post'));
    }

    // Create post form
    public function create()
    {
        return view('blog.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        $this->blogService->createPost($request->all());
        return redirect()->route('posts.index');
    }

    // Edit post form
    public function edit($id)
    {
        $post = $this->blogService->getPostById($id);
        return view('blog.edit', compact('post'));
    }

    // Update an existing post
    public function update(Request $request, $id)
    {
        $this->blogService->updatePost($id, $request->all());
        return redirect()->route('posts.index');
    }

    // Delete a post
    public function destroy($id)
    {
        $this->blogService->deletePost($id);
        return redirect()->route('posts.index');
    }
}

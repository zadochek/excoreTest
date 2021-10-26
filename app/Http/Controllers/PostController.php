<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePost;

class PostController extends Controller
{
    /**
     * Displays the record creation form.
     *
     */
    public function create()
    {
        $this->authorize('create-post', auth()->user());
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }
    
    /**
     * Creates a record.
     *
     * @var $request
     */
    public function store(CreatePostRequest $request)
    {
        $imagePath = $request->image->store('images', 'public');

        Post::create(array_merge($request->validated(), ['image' => $imagePath, 'user_id' => auth()->user()->id]));
        
        return redirect()->route('posts')->with('message', 'Запись успешно создана!');
    }

    /**
     * Displays a list of entries depending on the user's role.
     *
     * @var $category
     */
    public function index($category = null)
    {
        $user = auth()->user();
        $roleManager = Role::where('name', 'manager')->first();

        $posts = Post::query();

        if ($category) {
            $posts = $posts->where('category_id', $category);
        }

        if ($user->roles->contains($roleManager)) {
            $managerUsers = User::select('id')->where('manager_id', $user->id)->pluck('id');
            $posts = $posts->with('user')->whereIn('user_id', $managerUsers)->paginate(10);
        } else {
            $posts = $posts->where('user_id', $user->id)->paginate(10);
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Displays a list of records of a specific user.
     *
     * @var $user
     */
    public function employeePosts(User $user)
    {
        $this->authorize('view', $user);
        $posts = Post::where('user_id', $user->id)->paginate(10);

        return view('posts.index', compact('posts'));
    }

    /**
     * Displays the record editing form.
     *
     * @var $post
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Updates the record data.
     *
     * @var $post, $request
     */
    public function update(Post $post, UpdatePost $request)
    {
        if ($request->image) {
            $imagePath = ['image' => $request->image->store('images', 'public')];
        }
        $post->update(array_merge($request->validated(), $imagePath ?? []));

        return redirect()->route('posts')->with('message', 'Запись "' . $post->title . '" успешно обновлена!');
    }

    /**
     * Deletes an entry.
     *
     * @var $post
     */
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts')->with('message', 'Запись успешно удалена!');
    }
}

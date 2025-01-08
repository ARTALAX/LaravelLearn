<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {

        //        $posts = Post::query()->first()->toArray();
        //        $posts = Country::all('code', 'name', 'population')->take(30)->toArray();
        //        $countries = Country::query()
        //            ->where('Population', '>', 1_000_000)
        //            ->orderBy('Population', 'desc')->limit(10)
        //            ->get(['Population', 'Name', 'Code']);
        //        dump($countries->toArray());
        //        $countries = Country::query()->findOrFail('AFG');
        //        dump($countries);
        //        $post = new Post;
        //        $post->title = 'Title-3';
        //        $post->content = 'Content-3';
        //        $post->category_id = 2;
        //        $post->save();
        //        $posts = Post::query()->create([
        //            'title' => 'post title',
        //            'content' => 'post content',
        //            'status' => 0,
        //            'category_id' => 1,
        //        ]);
        //        dump($posts);
        //        return response()->json($countries);

        //        dd($countries);

        //        return view('welcome', compact('posts'));
        //        $categories = Category::query()->withCount('Posts')->get();
        //        dump($categories->toArray());
        //        foreach ($categories as $category) {
        //            echo $category->title.'|'.($category->posts_count).'<br>';
        //            foreach ($category->Posts as $post) {
        //                echo $post->title.'<br>';
        //            }
        //            echo '<hr>';
        //        }
        //        $category = Category::query()->find(2);
        //        dump($category->posts);
        //        $category->posts()->save(new Post(['title' => 'category-5', 'slug' => 'category-5', 'content' => 'content-5', 'status' => '1']));
        //        $category->refresh();
        //        dump($category->posts);
        //        dump($category->toArray());
        //        $posts = $category->getPosts;
        //        dump($posts->toArray());
    }

    //    public function store()
    //    {
    //        var_dump($_POST);
    //    }
    //
    //    public function delete()
    //    {
    //        Post::destroy('3');
    //    }
    //
    //    public function update(Request $request)
    //    {
    //        $post = Post::query()->where('id', $request->id)
    //            ->update($request->all());
    //
    //        return 'OK';
    //    }
}

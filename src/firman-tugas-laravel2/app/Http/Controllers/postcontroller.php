<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Sastrawi\Stemmer\StemmerFactory;

class postcontroller extends Controller
{

    function index(){

        $post = post::query()->get();
        return view('post.list', [
            'post' => $post
        ]);
    }

    function showSearch(){
        return view('search');
    }

    function search(Request $request){
        $stemerFactory = new \Sastrawi\Stemmer\StemmerFactory();
        $stemer = $stemerFactory->createStemmer();
        $quey = $request->input('search');

        $data = explode(" ", $stemer->stem($quey));
        $result = array_diff($data);
        $hasil = implode(" ",$result);

        $post = post::where('judul', 'LIKE', '%' . $hasil . '%')->orWhere('artikel', 'LIKE', '%' . $hasil. '%')->get()
                ->map( function($p) use($hasil){
                    similar_text($hasil, $p, $percent);
                    $p['percent'] = $percent;
                    return $p;
        });
        return view(('post.blog'), compact('post'));
    }

    function blog(){
        $post = post::query()->get();
        return view('post.blog', [
            'post' => $post,
        ]);
    }

    function detail($id){
        $posts = post::query()
                ->where('id', $id)
                ->first();
        return view('post.detail', [
            'post' => $posts
        ]);
    }

    function store(){
        return view('post.store');
    }

    function create(Request $rq){
        $created = [
            'judul' => $rq->input('judul'),
            'artikel' => $rq->input('artikel'),
            'gambar' => $rq->file('gambar')->store('img', 'public')
        ];

        post::query()->create($created);
        return redirect(route('post.list'));
    }

    function updated($id){
        $post = post::query()
                ->where('id', $id)
                ->first();
            return view('post.updated', [
                'post' => $post
            ]);
    }

    function update(Request $rq, $id){
        $update = [
            'judul' => $rq->input('judul'),
            'artikel' => $rq->input('artikel')
        ];

        if($rq->hasFile('gambar')) {
            $update['gambar'] = $rq->file('gambar')->store('img', 'public');
        }

        post::query()->where('id', $id)->update($update);
        return redirect(route('post.list'));
    }

    function deleted($id){
        $post = post::query()->where('id', $id)->first();
        $post->delete();
        Storage::disk('public')->delete($post->gambar);
        return redirect()->back();
    }
}

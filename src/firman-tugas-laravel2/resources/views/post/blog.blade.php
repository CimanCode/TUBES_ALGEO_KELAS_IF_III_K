@extends('home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <div class="w-[1250px] mx-auto">
        <div class="mt-20 flex">
            <form action="{{ route('post.search') }}" method="GET">
                <div class="flex items-center gap-4">
                    <h1 class="text-center items-center text-[20px] font-bold text-cyan-900">My Simple Search</h1>
                    <div class="flex justify-center gap-1">
                        <input type="text" class="w-[400px] shadow-xl rounded-lg focus:outline-none" name="search" value="{{ request('search') }}">
                        <div class="bg-cyan-600 p-2 rounded-xl text-center text-white shadow-lg">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="mx-auto shadow-lg mt-4 p-6">
            <div class="flex justify-between items-center mb-10">
                <h1 class="text-gray-800 font-bold text-[50px]">Post<span class="text-[60px] text-yellow-500 font-bold">Q</span></h1>
                <h1 class="text-gray-800 font-bold text-[50px]">All Post</h1>
            </div>
            @foreach ($post as $posts)
            <div class="flex-col text-center mx-auto mt-8">
                <div class="flex gap-2 justify-center items-center">
                    <h1 class="text-[20px] font-bold">Hasil Cosine Similarity :
                    </h1>
                    @if ($posts->percent)
                    <div class="bg-cyan-700 w-fit rounded-md p-1 text-[20px] font-bold text-white">
                        {{$posts->percent}}
                    </div>
                    @endif
                </div>
                <h1 class="text-[50px] font-bold">{{ $posts->judul }}</h1>
                <div class="flex justify-center">
                    <img src="{{ Storage::url($posts->gambar) }}" class="w-fit">
                </div>
                <div class="mt-4 text-center">
                    <p class="text-[18px] text-slate-900 truncate">{{ $posts->artikel }}</p>
                </div>
                <div class="bg-cyan-600 p-2 rounded-lg w-[120px] mx-auto text-white text-[18px] text-center mt-4">
                    <a href="{{ route('post.detail', ["id"=>$posts->id])  }}"><button>Read More</button></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection

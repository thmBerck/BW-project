<?php 
$articles = DB::table('articles')->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latest News - EntertainmentTM</title>
    <link rel="stylesheet" href="build/assets/css/latestnews.css">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Latest News') }}
            </h2>
        </x-slot>
        <div class="page">
            @foreach($articles as $article)
            <div class="article">
                <div class="title"> 
                    {{$article->title}} 
                </div>
                <div class="body">
                    {{$article->body}}
                </div>
            </div> 
            @endforeach
        </div>
    </x-app-layout>
</body>
</html>

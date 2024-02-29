@extends('layouts.app')
@section('content')
   <div class="bg-white p-7 border-b border-gray-200">
      <h2 class="mx-20 font-semibold text-xl text-gray-800 leading-tight">
         {{ __('myTranslations.Posts') }}
      </h2>
   </div>
   <div class="container mx-auto my-6">
      <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl">
         {{ $post->title }}
      </h1>
      <h2 class="mb-4 text-2xl font-medium leading-none tracking-tight">{{ $post->extract }}</h2>
      <p class="mb-6 text-lg font-normal">{{ $post->content }}</p>
      <h2>@lang('myTranslations.Expirable'): {{ $post->caducable ? 'Yes' : 'No' }}</h2>
      <h2>@lang('myTranslations.Commentable'): {{ $post->comentable ? 'Yes' : 'No' }}</h2>
      <h3>@lang('myTranslations.Access'): {{ $post->access }}</h3>
      
   </div>
@endsection
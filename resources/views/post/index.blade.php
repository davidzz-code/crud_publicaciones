@extends('layouts.app')
@section('content')
   <div class="bg-white p-7 border-b border-gray-200">
      <h2 class="mx-20 font-semibold text-xl text-gray-800 leading-tight">
         {{ __('myTranslations.Posts') }}
      </h2>
   </div>
   @forelse ($posts as $post)
      <div class="py-12">
         <div class="w-3/5 mx-auto sm:px-6 lg:px-8 font-medium">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 flex items-center justify-between">
                  <div class="flex items-center justify-around w-1/2">
                     <span class="text-xl">{{ $post->title }}</span>
                     -
                     <div class="flex flex-col">
                        <span class="text-gray-400 text-sm">{{ $post->user->name }}</span>
                        <span class="text-gray-400 text-sm">{{ $post->created_at }}</span>
                     </div>
                  </div>
                  <div class="flex">
                     <a href="{{ route('post.show', $post->id) }}">
                        <button class="bg-transparent hover:bg-gray-950 font-semibold hover:text-white py-2 px-4 border border-gray-950 hover:border-transparent rounded">@lang('myTranslations.Show')</button>
                     </a>
                     <a href="{{ route('post.edit', $post->id) }}">
                        <button class="mx-2 bg-transparent hover:bg-blue-600 font-semibold hover:text-white py-2 px-4 border border-blue-600 hover:border-transparent rounded">@lang('myTranslations.Edit')</button>
                     </a>
                     <form method="POST" action="{{ route('post.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="@lang('myTranslations.Delete')" class="hover:cursor-pointer bg-transparent hover:bg-red-600 font-semibold hover:text-white py-2 px-3 border border-red-600 hover:border-transparent rounded">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   @empty
   <div class="container mx-auto my-4">
      <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl">
         @lang('myTranslations.No data')
      </h1>
   </div>
   @endforelse
@endsection
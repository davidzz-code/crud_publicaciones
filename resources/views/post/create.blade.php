@extends('layouts.app')
@section('content')
   <div class="bg-white p-7 border-b border-gray-200">
      <h2 class="mx-20 font-semibold text-xl text-gray-800 leading-tight">
         {{ __('myTranslations.Create a post') }}
      </h2>
   </div>

   @if ($errors->any())
   <div class="container mx-auto my-3">
      <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
         <p class="font-bold">@lang('myTranslations.Errors')</p>
         <ul class="list-disc">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   </div>
   @endif

   <div class="container mx-auto w-3/5 px-20 py-5 bg-white my-10 rounded-md">
      <form method="POST" action="{{ route('post.store') }}">
         @csrf
         <!-- Título -->
         <div class="mt-4">
            <label for="title">@lang('myTranslations.Publication title')</label>
            <input type="text" name="title" id="title" class="block mt-1 w-full rounded-md border-gray-400 shadow @error('title') border-red-500 @enderror" value="{{ @old('title') }}">
            @error('title')
               <p class="text-red-500">{{ $message }}</p>
            @enderror
         </div>

         <!-- Extracto -->
         <div class="mt-4">
            <label for="extract">@lang('myTranslations.Publication extract')</label>
            <input type="text" name="extract" id="extract" class="block mt-1 w-full rounded-md border-gray-400 shadow @error('extract') border-red-500 @enderror" value="{{ @old('extract') }}">
            @error('extract')
               <p class="mt-2 text-red-500">{{ $message }}</p>
            @enderror
         </div>
         
         <!-- Contenido -->
         <div class="flex items-center justify-between mt-4">
            <div class="w-1/2">
               <label for="content">@lang('myTranslations.Publication content')</label>
               <textarea name="content" id="content" cols="30" rows="10" class="block mt-1 h-40 w-full rounded-md border-gray-400 shadow @error('content') border-red-500 @enderror">{{@old('content')}}</textarea>
               @error('content')
               <p class="mt-2 text-red-500">{{ $message }}</p>
               @enderror
            </div>

            <div class="mr-20">
               <!-- Checkboxes -->
               <div>
                  <input type="checkbox" name="expirable" id="expirable" {{ old('expirable') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-60">
                  <label for="expirable" class="ms-2">@lang('myTranslations.Expirable')</label>
               </div>
               <div>
                  <input type="checkbox" name="commentable" id="commentable" {{ old('commentable') ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-60">
                  <label for="commentable" class="ms-2">@lang('myTranslations.Commentable')</label>
               </div>
               
               
               <!-- Select -->
               <select name="access" id="access" class="block mt-6 rounded-md border-gray-400 shadow @error('access') border-red-500 @enderror">
                  <option value="" selected disabled hidden>@lang('myTranslations.Choose an option')</option>
                  <option value="PRIVATE" {{ old('access') ? 'selected' : ''}} >@lang('myTranslations.Private')</option>
                  <option value="PUBLIC" {{ old('access') ? 'selected': '' }} >{{__('myTranslations.Public')}}</option>
               </select>
               @error('access')
                  <p class="mt-2 text-red-500">{{ $message }}</p>
               @enderror
            </div>
         </div>
         <div class="flex items-center justify-end mt-4">
            <button class="bg-gray-900 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
               {{ __('myTranslations.Create') }}
            </button>
         </div>
      </form>
   </div>
@endsection
@extends('layouts.app')
@section('content')
@section('title', 'Ajouter un restaurant')

<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="flex" aria-label="Breadcrumb">
  <ol class="flex items-center space-x-4">
    <li>
      <div>
        <a href="/" class="text-gray-400 hover:text-gray-500">
          <!-- Heroicon name: solid/home -->
          <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
          </svg>
          <span class="sr-only">Home</span>
        </a>
      </div>
    </li>

    <li>
      <div class="flex items-center">
        <!-- Heroicon name: solid/chevron-right -->
        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
        <a href="{{ route('restaurants.index') }}"class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Restaurants</a>
      </div>
    </li>

    <li>
      <div class="flex items-center">
        <!-- Heroicon name: solid/chevron-right -->
        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
        <a href="{{ route('restaurants.create') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Ajouter un restaurant</a>
      </div>
    </li>
  </ol>
</nav>

<br>

<div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        Ajouter un restaurant
    </h2>
  </div>
</div>

<br>


<div>
  <div class="md:grid md:grid-cols-1 md:gap-1">
    <div class="mt-6 md:mt-0 md:col-span-2">
      <form action="{{ route('restaurants.store') }}" enctype="multipart/form-data" method="POST">
      @csrf
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Nom du restaurant</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Nom" required>
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse du restaurant</label>
                <div class="mt-1">
                    <input type="text" name="adresse" id="adresse" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Adresse" required>
                </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">
                Logo du restaurant
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  <div class="flex text-sm text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <input type="file" id="file" name="file">
                    </label>
                  </div>
                  <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>
            </div>
 


          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Ajouter
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<style>
    input {
    padding: 10px;
    border: 1px solid #efefef;
    }
</style>
@endsection

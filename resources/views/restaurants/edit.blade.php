@extends('layouts.app')
@section('content')
@section('title', 'Modifier un restaurant')
<div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        Modifier un restaurant
    </h2>
  </div>
</div>

<br>


<div>
  <div class="md:grid md:grid-cols-1 md:gap-1">
    <div class="mt-6 md:mt-0 md:col-span-2">
      <form action="{{ route('restaurants.update', $restaurant->id) }}" enctype="multipart/form-data" method="POST">
      @csrf
      @method('PUT')
     
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Nom du restaurant</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ $restaurant->name }}" required>
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse du restaurant</label>
                <div class="mt-1">
                    <input type="text" name="adresse" id="adresse" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" value="{{ $restaurant->adresse }}" required>
                </div>
            </div>


          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Modifier
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

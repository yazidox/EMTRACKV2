@extends('layouts.app')
@section('content')
@section('title', 'Rapport quotidien')

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
        <a href="{{ route('salariers.index') }}"class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Salariés</a>
      </div>
    </li>

    <li>
      <div class="flex items-center">
        <!-- Heroicon name: solid/chevron-right -->
        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
        <a  class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Rapport quotidien</a>
      </div>
    </li>
  </ol>
</nav>

<br>

<div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
  <div class="flex-1 min-w-0">
    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        Rapport quotidien de <span style="text-transform: capitalize;"> @foreach ($rapport_name as $key => $value ) {{ $value->nom }}  @endforeach</span>
    </h2>
  </div>
  <div class="mt-4 flex md:mt-0 md:ml-4">
    <a href="{{ route('salariers.create') }}">
    <a href="{{ route('pdfrapport',$value->id) }}"  type="button" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Telecharger le rapport en PDF
    </a>
    </a>
  </div>
</div>



<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Date du jour
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Heure d'arrivée
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Heure de départ
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nombre d'heure travailé
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Salaire par jour
              </th>
              
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
          @foreach ($rapport as $key => $value)
                <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">{{ $value->today_date }}</span></div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $value->h_arrive }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  <?php
                  if(empty($value->h_depart)){
                    echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">Non precise</span>';
                  }else {
                    echo $value->h_depart;
                  }
                  ?>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                <?php
                if(empty($value->h_depart)){
                    echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">Non calculé</span>';
                }else {
                    $hour1 = 0; 
                    $hour2 = 0;
                    $mydate1 = $value->today_date . " " . $value->h_arrive .":00";
                    $mydate2 = $value->today_date . " " . $value->h_depart .":00";
                    $datetimeObj1 = new DateTime($mydate1);
                    $datetimeObj2 = new DateTime($mydate2);
                    $interval = $datetimeObj1->diff($datetimeObj2);
                    
                    if($interval->format('%a') > 0){
                    $hour1 = $interval->format('%a')*24;
                    }
                    if($interval->format('%h') > 0){
                    $hour2 = $interval->format('%h');
                    }
                    echo $interval->format('%h') . " heures " .$interval->format('%i')." minutes";
            }

?>
                </div>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">

                <?php
                 if(empty($value->h_depart)){
                    echo '<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">Non calculé</span>';
                }else {
                    $hour1 = 0; 
                    $hour2 = 0;
                    $mydate1 = $value->today_date . " " . $value->h_arrive .":00";
                    $mydate2 = $value->today_date . " " . $value->h_depart .":00";
                    $datetimeObj1 = new DateTime($mydate1);
                    $datetimeObj2 = new DateTime($mydate2);
                    $interval = $datetimeObj1->diff($datetimeObj2);
                    
                    if($interval->format('%a') > 0){
                    $hour1 = $interval->format('%a')*24;
                    }
                    if($interval->format('%h') > 0){
                    $hour2 = $interval->format('%h');
                    }
                    $hourtominute = $interval->format('%h') * 60;
                    $minute = $interval->format('%i');
                    $hourminute = $hourtominute + $minute;
                    $finalprice = $hourminute * $value->salaire_h / 60;
                    echo number_format((float)$finalprice, 2, '.', '') . "€";
              }
                ?>

                </div>
        </td>
                </tr>

                
          @endforeach
          </tbody>
        </table>
      </div>
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

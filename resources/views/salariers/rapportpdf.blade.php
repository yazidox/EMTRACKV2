<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>

<h1>EMTRACK</h1>
<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
        Rapport quotidien de <span style="text-transform: capitalize;"> @foreach ($rapport_name as $key => $value ) {{ $value->nom }}  @endforeach</span>
</h2>
<br>
<br>
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

</body>
</html>
<div class="car-info card-info md:grid md:grid-cols-2 mt-5 border-b-2">

    @if(count($cars) > 0)
        @foreach($cars as $car)
        @endforeach
    @endif

    <img class="object-fill h-full" src="{{ asset('storage/'.$car->image)}}">
    <div class="flex flex-col items-center pt-2 bg-slate-100 pb-2 md:pb-2">

             <div class="car-title text-2xl my-2">{{$car->CarModels->CarMakes->name}} {{$car->CarModels->name}} {{$car->name}}</div>

        @if(count($carAverageScores) > 0)
            @foreach($carAverageScores as $carScore)
                @php $featureScores = collect(['reliability' => $carScore->reliability,'engines' => $carScore->engines,
                'interior' => $carScore->interior,'chassis' => $carScore->chassis,'comfort' => $carScore->comfort,'handling' => $carScore->handling,
                'practicality' => $carScore->practicality,'power_economy' => $carScore->power_economy]) @endphp
            @endforeach
       @endif

        <div class="car-ratings">
            <div class="flex justify-center">
                @php $rating = $featureScores->avg();  @endphp
                <p class="mt-1">Automobilio reitingas @php echo round($rating, 2) @endphp</p>
                    @foreach(range(1,5) as $i)
                        <div class="flex items-center justify-center">
                            <span class="fa-stack w-5">
                                <i class="fas fa-star fa-stack-1x text-gray-300 "></i>
                                @if($rating >0)
                                    @if($rating >0.5)
                                        <i class=" fas fa-star text-amber-300 fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half text-amber-300  fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                        </div>
                    @endforeach
            </div>
            @if(count($reviewCounts) > 0)
                @foreach($reviewCounts as $count)  <p class="text-center mt-3 text-slate-500">Iš viso įvertinimu: {{$count->car_reviews_count}}</p>
                @endforeach
                @else
                <p class="text-center mt-3 text-slate-500">Įvertinimu nera</p>
            @endif
            @php $featureTitles = collect(['Patikimumas', 'Varikliai',
            'Interjeras' ,'Kėbulas','Komfortas','Valdomumas',
            'Praktiškumas' ,'Galia/Ekonomika' ]) @endphp

            <div class="grid grid-cols-2">
                <div class="mt-0.5">
                    @foreach($featureTitles  as $featureTitle )
                    <div class="flex flex-col">
                    {{$featureTitle}}
                    </div>
                    @endforeach
                </div>

                <div class="">
                @foreach($featureScores as $featureScore)
                <div class="h-6">
                   {{round( $featureScore, 1)}}

                   @php $rating =  $featureScore @endphp
                        @foreach(range(1,5) as $i)
                            <span class="fa-stack w-5 ">
                                <i class="fas fa-star fa-stack-1x text-gray-300 "></i>
                                @if($rating >0)
                                    @if($rating >0.5)
                                        <i class=" fas fa-star text-amber-300 fa-stack-1x"></i>
                                    @else
                                        <i class="fas fa-star-half text-amber-300  fa-stack-1x"></i>
                                    @endif
                                @endif
                                @php $rating--; @endphp
                            </span>
                       @endforeach
                    </div>
                @endforeach
                </div>
            </div>

            <div class="flex justify-between my-2">
                @if(count($recommendCounts) > 0)
                @foreach($recommendCounts as $count)
                <div>
                    <p>Rekomenduoja <span class="bg-lime-600 text-gray-100 px-4 py-2 rounded-full">{{$count->count}}</span> </p>
                </div>
                @endforeach
                @else
                <div>
                    <p>Rekomenduoja <span class="bg-lime-600 text-gray-100 px-4 py-2 mr-1 rounded-full">0</span> </p>
                </div>
            @endif
            @if(count($notRecommendCounts) > 0)
                @foreach($notRecommendCounts as $count)
                <div>
                    <p> Nerekomenduoja <span class="bg-red-700 text-gray-100 px-4 py-2 rounded-full">{{$count->count}}</span> </p>
                </div>
                @endforeach
                @else
                <div>
                    <p> Nerekomenduoja <span class="bg-red-700 text-gray-100 px-4 py-2 rounded-full">0</span> </p>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>

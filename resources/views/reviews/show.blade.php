<x-app-layout>

<div class="container 2xl:w-8/12 mx-auto lg:grid lg:grid-cols-7">

    <section class=" card-info lg:col-span-3 xl:col-span-2 bg-slate-100  mt-5 h-full border-b-2">
        <div>
        <img src="{{ asset('images/mercedes.jpg')}}">
        </div>

        <div class="flex flex-col items-center pt-2 pb-2 md:pb-2">
            <div class="car-title text-2xl my-2">{{$review->CarMake->name}}  {{$review->CarModel->name}} {{$review->CarGeneration->name}}</div>

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

                <!-- Ivertinimu skaicius -->
                @if(count($reviewCounts) > 0)
                    @foreach($reviewCounts as $count)  <p class="text-center mt-3 text-slate-500">Iš viso įvertinimu: {{$count->car_reviews_count}}</p>
                    @endforeach
                    @else
                    <p class="text-center mt-3 text-slate-500">Įvertinimu nera</p>
                @endif

                <!-- Ivertinimai atskiromis kategorijomis -->

                @php $featureTitles = collect(['Patikimumas', 'Varikliai',
                'Interjeras' ,'Kėbulas','Komfortas','Valdomumas',
                'Praktiškumas' ,'Galia/Ekonomika' ]) @endphp

                <div class="grid grid-cols-2 ">
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
    </section>

    <section class="review-section md:pt-5 px-8 md:col-span-4 xl:col-span-5 ">

        @php $featureScores = collect(['reliability' => $review->reliability,'engines' => $review->engines,
        'interior' => $review->interior,'chassis' => $review->chassis,'comfort' => $review->comfort,'handling' => $review->handling,
        'practicality' => $review->practicality,'power_economy' => $review->power_economy]) @endphp

        @php $featureTitles = collect(['Patikimumas','Varikliai','Interjeras','Kėbulas','Komfortas','Valdomumas','Praktiškumas','Galia/Ekonomika']) @endphp

        <!-- Vartotojo duomenys -->
        <div class="flex items-center justify-between bg-slate-700 text-white rounded py-2 px-2 mb-2 mt-5 md:mt-0">

            <div>
              <a href="#" class="flex items-center" >
                <div class="rounded-full bg-lime-600 px-3.5 py-2"><i class=" fa-solid fa-user text-xl"></i></div>
                <p class="ml-2">{{$review->user->name}}</p>
              </a>
            </div>

            <div class="flex">
               <div class="flex p-1"><i class="fa-solid fa-hand-point-up px-1"></i><p class="hidden md:block">Reitingas:5.5</p></div>
               <div class="flex p-1"><i class="fa-solid fa-note-sticky mt-1 px-1"></i><p class="hidden md:block">Parašyta atsiliepimų:</p>
                @foreach ($totalReviews as $totalReview)
                    {{$totalReview->reviews_count}}

                @endforeach
            </div>
            </div>

        </div>

         <div class="xl:grid xl:grid-cols-4 gap-2">
            <div class="col-span-2">


                   <!-- Mobile review title -->
        <div class="review-title text-2xl my-3 font-bold lg:hidden">{{$review->title}}</div>
        <!-- Mobile review title-->

                <div class="">
                    <div class="date text-sm font-light text-left m-1">{{$review->created_at->format('Y-m-d')}}</div>
                </div>
            <div class="flex flex-col mx-1">
                <div class=""><i class="fa-solid fa-car-side w-5"></i> Litrazas:{{$review->engine_displacement}} </div>
                <div class=""><i class="fa-solid fa-gas-pump w-5"></i> Kuro Tipas:{{$review->fuel_type}}</div>
                <div class=""><i class="fa-solid fa-car w-5"></i> Kėbulo tipas:{{$review->body_type}} </div>
                <div class=""><i class="fa-solid fa-circle-h w-5"></i></i> Pavaru deze:{{$review->gearbox_type}} </div>
                <div>
                 <div class=""><i class="fa-solid fa-road w-6"></i>Kuro Sanaudos:</div>
                    <div class="flex">
                    <div ><i class="fa-solid fa-city"></i> Mieste:{{$review->consumption_city}} l</div>
                    <div class="mx-1"><i class="fa-solid fa-road"></i></i> Užmiestyje:{{$review->consumption_country}} l</div>
                    <div class="mx-1"><i class="fa-solid fa-city"></i> Vidutines:{{$review->consumption_mixed}} l</div>
                 </div>
                </div>

            </div>

            <div>
                <div class="advantages flex items-center"><div><i class="fa-solid fa-circle-plus text-3xl text-lime-600"></i></div><p class="ml-2">{{$review->positives}}</p></div>
                <div class="disadvantages flex items-center"><div><i class="fa-solid fa-circle-minus text-3xl text-red-700"></i></div><p class="ml-2">{{$review->negatives}}</p></div>
            </div>

            </div>

            <div class="col-span-2">
                <div class="md:mr-2">

                <div class="grid grid-cols-2">

                    <div class="mt-0.5">
                        @foreach($featureTitles  as $featureTitle )
                        <div class="flex flex-col">
                        {{$featureTitle}}
                        </div>
                        @endforeach
                    </div>

                    <div>
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

                <div class="flex">
                    @php $rating = $featureScores->avg();  @endphp
                    <p class="mt-1">Vertinimo vidurkis @php echo round($rating, 2) @endphp</p>
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

                    <div class="flex items-center ">
                        <p>Rekomenduoju:</p>
                        <div class="recommend p-2 ml-1 bg-lime-600 text-white rounded">{{$review->recommend}}</div>
                    </div>
                </div>
            </div>

        </div>

        <div>
            <div class="break-words">
                <div class="review-title text-2xl mt-1 hidden lg:block">{{$review->title}}</div>
                <div class="review-suggestion md:mx-0">
                    <p class="text-xl">Patarimas perkančiajam</p>
                    <p class=" ">{{$review->suggestion}}</p>
                </div>
                <div class="review-body md:mx-0">
                    <p class="text-xl">Atsiliepimo aprašymas</p>
                    <p class=" ">{{$review->body}}</p>
                </div>
            </div>
            <section class="flex flex-wrap flex-row">
                <div class="overflow-hidden text-gray-700">
                    <div class="container py-2 mx-auto ">
                      <div class="flex flex-wrap -m-1 md:-m-2">
                        <div class="flex flex-wrap ">
                            @foreach ($images as $image)
                          <div class="md:w-1/2 py-2 md:p-2">
                          <img src="/review_images/{{$image->image}}" class="block object-cover object-center w-full h-full rounded-lg">
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
              </div>
            </section>

    </section>

    </div>

</x-app-layout>

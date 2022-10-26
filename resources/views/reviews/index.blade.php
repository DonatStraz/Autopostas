<x-app-layout>

    <div class="container lg:w-6/12 mx-auto">

        @include('inc.reviews-dropdown')

        <div class="review-cards">

            @if(count($reviews) > 0)
            @foreach($reviews as $review)

            @php $featureScores = collect(['reliability' => $review->carGeneration->carReviews->avg('reliability'),'engines' => $review->carGeneration->carReviews->avg('engines'),
            'interior' => $review->carGeneration->carReviews->avg('interior'),'chassis' => $review->carGeneration->carReviews->avg('chassis'),
            'comfort' => $review->carGeneration->carReviews->avg('comfort'), 'handling' => $review->carGeneration->carReviews->avg('handling'),
            'practicality' => $review->carGeneration->carReviews->avg('practicality'), 'power_economy' => $review->carGeneration->carReviews->avg('power_economy')]) @endphp

                <div class="review-card md:grid md:grid-cols-3 border-b-4 mt-2 bg-slate-50 border-slate-200">
                    <div class="car-info col-span-1">

                        <div class="flex flex-col items-center bg-slate-100 pb-2 md:pb-2">

                            @if($review->carGeneration->hero_image)
                            <img class="object-fill h-full" src="{{ asset('storage/'.$review->carGeneration->hero_image)}}">
                            @else
                            <img  src="{{ asset('images/image-unavailable.jpg')}}">
                            @endif

                            <div class="car-title text-xl"><a href="/automobiliai/{{$review->carGeneration->id}}">{{$review->carMake->name}} {{$review->carModel->name}} {{$review->carGeneration->name}}</a></div>
                            @php $rating = $featureScores->avg();  @endphp

                            <div class="flex">Automobilio reitingas @php echo round($rating, 1)  @endphp
                            <svg aria-hidden="true" class="w-5 h-5 mt-0.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            </div>

                            <div class="flex ">Įvertinimų skaičius {{$review->carGeneration->carReviews->count('id')}}
                            </div>

                        </div>
                    </div>



                    <div class="review-info col-span-2 md:ml-10">

                        <div class="flex  flex-col items-center md:items-start">
                            <div class="date text-sm font-light mt-3">{{$review->created_at->format('Y-m-d')}}</div>
                            <div class="review-title text-xl"><a href="/atsiliepimai/{{$review->id}}/{{$review->carGeneration->id}}">{{$review->title}}</a></div>
                        </div>

                        @php $userReviewScore = collect(['reliability' => $review->reliability,'engines' => $review->engines,
                        'interior' => $review->interior,'chassis' => $review->chassis,'comfort' => $review->comfort,'handling' => $review->handling,
                        'practicality' => $review->practicality,'power_economy' => $review->power_economy]) @endphp

                        <div class="flex items-center md:justify-start  justify-center">

                            @php $rating = $userReviewScore->avg();  @endphp
                            <div class="flex">Vertinimo vidurkis @php echo round($rating, 1) @endphp
                            <svg aria-hidden="true" class="w-5 h-5 mt-0.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            </div>

                            <div class="flex items-center md:ml-10">
                                <p>Rekomenduoju:</p>
                                <div class="recommend p-2 ml-1 bg-lime-600 text-white rounded">{{$review->recommend}}</div>
                            </div>
                        </div>

                        <div class="mx-5 md:mx-0">
                            <div class="advantages flex items-center"><div><i class="fa-solid fa-circle-plus text-3xl text-lime-600"></i></div><p class="ml-2">{{$review->positives}}</p></div>
                            <div class="disadvantages flex items-center"><div><i class="fa-solid fa-circle-minus text-3xl text-red-700"></i></div><p class="ml-2">{{$review->negatives}}</p></div>
                        </div>

                        <div class="review-body mx-5 md:mx-0">{{$review->body}}</div>

                        <a href="/atsiliepimai/{{$review->id}}/{{$review->carGeneration->id}}" class="text-lime-600 font-bold ml-5 md:ml-0">Pilnas Atsiliepimas..</a>

                    </div>
                </div>

                @endforeach
                {{ $reviews->links() }}
                @else
                <p>No reviews found</p>

                @endif
            </div>
        </div>

        </div>
    </div>


</x-app-layout>

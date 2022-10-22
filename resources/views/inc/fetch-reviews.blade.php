@if(count($reviews) > 0)
        @foreach($reviews as $review)

            @foreach($carAverageScores as $carScore)
            @php $featureScores = collect(['reliability' => $carScore->reliability,'engines' => $carScore->engines,
            'interior' => $carScore->interior,'chassis' => $carScore->chassis,'comfort' => $carScore->comfort,'handling' => $carScore->handling,
            'practicality' => $carScore->practicality,'power_economy' => $carScore->power_economy]) @endphp
            @endforeach

            <div class="review-card md:grid md:grid-cols-3 mt-2 border-b-4 border-slate-200">
                <div class="car-info col-span-1">
                  <img src="{{ asset('storage/'. $review->carGeneration->image)}}">
                    <div class="flex flex-col items-center pt-2 bg-slate-100 pb-2 md:pb-2">
                        <div class="car-title text-2xl">{{$review->carMake->name}} {{$review->carModel->name}} {{$review->carGeneration->name}}</div>

                        <div class="flex justify-center">
                            @php $rating = $featureScores->avg();  @endphp
                            <p class="mt-1.5">Automobilio reitingas @php echo round($rating, 2) @endphp</p>
                        </div>

                    </div>
                </div>
                <div class="review-info col-span-2 md:ml-10">

                    <div class="flex  flex-col items-center md:items-start">
                        <div class="date text-sm font-light mt-1">{{$review->created_at->format('Y-m-d')}}</div>
                        <div class="review-title text-xl"><a href="/atsiliepimai/{{$review->id}}/{{$review->carGeneration->id}}">{{$review->title}}</a></div>
                    </div>

                    <div class="flex items-center md:justify-start  justify-center">
                        <p>Mano Vertinimas:</p>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
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

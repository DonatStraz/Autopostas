<x-app-layout>
    <div class="container 2xl:w-8/12 mx-auto ">
        <div class="xl:grid gap-4 xl:grid-cols-5">

        <div class="bg-slate-600 text-white rounded col-span-2 mt-5 md:mt-0 px-10 py-5">
            <form  enctype="multipart/form-data" method="POST" action="">
            <div class="text-end">

              <button type="submit" id="acceptChanges" class=" invisible">Išsaugoti pakeitimus<i class="fa-solid fa-check text-lime-600 text-2xl "></i></button>
              <button type="button" id="editUserBtn" class="text-2xl"><i class="fa-solid fa-pen-to-square"></i></button>

            </div>
            <div class="flex justify-center">
                <div class="flex flex-col text-center ">
                    <div><i class="rounded-full shadow py-8 px-9 bg-lime-600 fa-solid fa-user text-7xl"></i></div>
                    <div><input class="bg-slate-600 text-center mt-1 " id="userName" disabled value="{{$user->name}}"></div>
                </div>
            </div>

            <div class="h-0.5 rounded bg-white my-3"></div>

            <div class="user-info">
                <div class="mt-2 flex justify-between">
                    <div><i class="fa-solid fa-envelope px-1"></i> {{$user->email}}</div>
                    <div><button type="button"><i class="fa-solid fa-pen-to-square"></i></div>
                </div>
            </div>

            <div class="h-0.5 rounded bg-white my-3"></div>

            <div class="flex flex-col mx-auto">
               <div class="flex text-left "><i class="fa-solid fa-hand-point-up px-1"></i><p class="">Reitingas: 5.5/10 <i class="fa-solid fa-star text-amber-300"></i></p> </div>
               <div class="flex "><i class="fa-solid fa-note-sticky mt-1 px-1"></i><p class="">Parašyti atsiliepimai:</p>
                @foreach ($totalReviews as $totalReview)
                    {{$totalReview->reviews_count}}
                @endforeach
              </div>
              <div class="flex text-left "><i class="mt-1 px-1 fa-solid fa-comment"></i><p class="">Komentarai: 5</p></div>
            </div>
            </form>
        </div>

        <div class="col-span-3 mx-2 ">
            <p class="text-xl py-2">Parašyti atsiliepimai</p>

            @if(count($reviews) > 0)
        @foreach($reviews as $review)

            <div class="review-card md:grid md:grid-cols-3 mb-2 border-b-4 border-slate-200">
                <div class="car-info col-span-1">

                    <img src="{{ asset('images/bmw-i4.jpg')}}">
                    <div class="flex flex-col items-center pt-2 bg-slate-100 pb-2 md:pb-2">

                        <div class="car-title text-2xl">{{$review->carMake->name}} {{$review->carModel->name}} {{$review->carGeneration->name}}</div>

                        <div class="flex justify-center">
                        <div>Automobilio reitingas</div>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="review-info col-span-2 md:ml-10">

                    <div class="flex justify-between">
                        <div class="date text-sm font-light mt-1">{{$review->created_at->format('Y-m-d')}}</div>

                        <div><a class="text-xl" href="redaguoti-atsiliepima/{{$review->id}}/{{$review->carGeneration->id}}"><i class="fa-solid fa-pen-to-square text-lime-600"></i></a></div>
                    </div>

                    <div class="review-title text-xl"><a href="atsiliepimai/{{$review->id}}/{{$review->carGeneration->id}}">{{$review->title}}</a></div>
                    <div class="flex items-center  md:justify-start  justify-between">
                        <p>Vertinimas
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        </div>

                        <div class="flex items-center md:ml-10">
                            <div><p>Rekomenduoju:</p></div>
                            <div class="recommend p-1 ml-1 bg-lime-600 text-white rounded">{{$review->recommend}}</div>
                        </div>
                    </div>

                    <div class="">
                        <div class="advantages flex items-center"><div><i class="fa-solid fa-circle-plus text-3xl text-lime-600"></i></div><p class="ml-2">{{$review->positives}}</p></div>
                        <div class="disadvantages flex items-center"><div><i class="fa-solid fa-circle-minus text-3xl text-red-700"></i></div><p class="ml-2">{{$review->negatives}}</p></div>
                    </div>

                    <div class="review-body">{{$review->body}}</div>

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
    </div>
</x-app-layout>

<x-app-layout>

    @include('inc.secondary-dropdown')

    <div class="container lg:w-6/12 md:mx-auto">
        @if(count($cars)>0)
        @foreach($cars as $car)
        <div class="review-cards">
            <div class="review-card flex flex-col md:flex-between  md:grid md:grid-cols-3 mt-5 mx-2 border-b-4 border-slate-200">

                    <section class="car-info bg-slate-100">

                        @if($car->image)
                         <div>
                            <img  src="{{ asset('storage/'.$car->image)}}">
                         </div>
                        @else
                         <div>
                            <img  src="{{ asset('images/image-unavailable.jpg')}}">
                         </div>
                        @endif

                        <div class="flex justify-center">
                            @php $featureScores = collect(['reliability' => $car->carReviews->avg('reliability'),'engines' => $car->carReviews->avg('engines'),
                            'interior' => $car->carReviews->avg('interior'),'chassis' => $car->carReviews->avg('chassis'),'comfort' => $car->carReviews->avg('comfort'),
                            'handling' => $car->carReviews->avg('handling'),'practicality' => $car->carReviews->avg('practicality'),
                            'power_economy' => $car->carReviews->avg('power_economy')]) @endphp
                            @php $rating = $featureScores->avg();  @endphp

                            <div class="flex flex-col items-center">
                                <div class="mt-2 text-xl">{{$car->CarModels->CarMakes->name}} {{$car->CarModels->name}} {{$car->name}}</div>
                                <div class=" flex">Automobilio reitingas @php echo round($rating, 2) @endphp
                                <svg aria-hidden="true" class="w-5 h-5 mt-0.5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                </div>
                            </div>

                        </div>

                    </section>

                    <div class="flex items-center justify-center md:justify-end col-span-2 my-3">
                        <div class="flex md:flex-col">

                        <a class="my-0.5 mx-1 bg-zinc-500 rounded-r-sm hover:bg-gray-700 transition ease-in-out text-lg p-2 border-slate-200 text-white text-center"
                        href="/automobiliai/{{$car->id}}">Apie automobilį</a>

                        <a class="my-0.5 mx-1 bg-zinc-500 rounded-r-sm hover:bg-gray-700 transition ease-in-out text-lg p-2 border-slate-200 text-white  text-center"
                        href="/rasyti-atsiliepima/{{$car->id}}">Rašyti atsiliepimą</a>

                         </div>
                    </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="flex justify-center">
         <p>Tokio automobilio dar nėra</p>
        </div>
        @endif

    </div>
</x-app-layout>

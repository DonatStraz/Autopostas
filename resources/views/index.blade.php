<x-app-layout>

    @include('inc.main-dropdown')



    <div class="container mx-auto mt-5">
        <p class="text-2xl">Nauji Automobilių įkelimai</p>
        <div section="new-cars-section">
            <div class="car-cards grid  lg:grid-cols-3 lg:gap-4 px-2 sm:px-0">
                @foreach($latestCars as $latestCar)

                    @if($latestCar->hero_image)
                    <a href="/automobiliai/{{$latestCar->id}}" style="background-image: url('{{ asset('storage/'.$latestCar->hero_image)}}');" class="bg-no-repeat bg-cover bg-center h-72 flex flex-col justify-between mt-2">
                    @else
                    <a href="/automobiliai/{{$latestCar->id}}" style="background-image: url('{{ asset('images/image-unavailable.jpg')}}');" class="bg-no-repeat bg-cover bg-center h-72 flex flex-col justify-between mt-2">
                    @endif

                    <div class="date p-3">
                        <span class="bg-amber-400 p-1">{{$latestCar->created_at->format('Y-m-d')}}</span>
                    </div>
                    <div class="title p-3">
                        <span class="text-2xl font-bold text-white">{{$latestCar->CarModels->CarMakes->name}} {{$latestCar->CarModels->name}} {{$latestCar->name}}</span>
                    </div>

                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-5">
        <div class="flex mb-1">
            <a href="{{ route('articles') }}" class="text-2xl">Straipsniai <i class="fa-solid fa-angles-right text-amber-400"></i></a>
        </div>
        <div section="new-cars-section">
            <div class="car-cards grid  lg:grid-cols-3 lg:gap-4 px-2 sm:px-0">
                <a href="#" style="background-image: url('{{ asset('images/e39.jpg')}}');" class="bg-no-repeat bg-cover bg-center h-72 flex flex-col justify-between mt-2">
                    <div class="date p-3">
                        <span class="bg-amber-400 p-1">Įkelta 2020-12-05</span>
                    </div>
                    <div class="title p-3">
                        <span class="text-2xl font-bold text-white">E39 Klasika</span>
                    </div>
                </a>
                <a href="#" style="background-image: url('{{ asset('images/e39.jpg')}}');" class="bg-no-repeat bg-cover bg-center h-72 flex flex-col justify-between mt-2">
                    <div class="date p-3">
                        <span class="bg-amber-400 p-1">Įkelta 2020-12-05</span>
                    </div>
                    <div class="title p-3">
                        <span class="text-2xl font-bold text-white">E39 Klasika</span>
                    </div>
                </a>
                <a href="#" style="background-image: url('{{ asset('images/e39.jpg')}}');" class="bg-no-repeat bg-cover bg-center h-72 flex flex-col justify-between mt-2">
                    <div class="date p-3">
                        <span class="bg-amber-400  p-1 ">Įkelta 2020-12-05</span>
                    </div>
                    <div class="title p-3">
                        <span class="text-2xl font-bold text-white">E39 Klasika</span>
                    </div>
                </a>
            </div>
        </div>
    </div>


</x-app-layout>

<x-app-layout>
    <div class="container lg:w-6/12 mx-auto ">

        @include('inc.car-info')

        @if (auth()->check())

           <form class="mt-5 md:mx-0 mx-3" enctype="multipart/form-data" method="POST" action="{{ route('store.review')}}">
            @csrf

            <div class="">
                  @foreach($cars as $car)
                    <input type="hidden" name="make_id" value="{{$car->carModels->carMakes->id}}">
                    <input type="hidden" name="model_id" value="{{$car->carModels->id}}">
                    <input type="hidden" name="generation_id" value="{{$car->id}}">
                  @endforeach

                <label for="title" class="block font-medium text-gray-900 dark:text-gray-300">Atsiliepimo pavadinimas</label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100" required>
            </div>
            <div class="block mb-2  font-medium text-gray-900 dark:text-gray-300">
                <label for="body" class="block  font-medium text-gray-900 dark:text-gray-300">Atsiliepimo aprašymas</label>
                <textarea type="text" name="body" id="body" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
            </div>
            <div class="">
                <label for="positives" class="block font-medium text-gray-900 dark:text-gray-300">Automobilio pliusai</label>
                <input type="text" name="positives" id="positives" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100"  required>
            </div>
            <div class="">
                <label for="negatives" class="block   font-medium text-gray-900 dark:text-gray-300">Automobilio minusai</label>
                <input type="text" name="negatives" id="negatives" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100"  required>
            </div>

            <div class="block font-medium text-gray-900 dark:text-gray-300">
                <label for="suggestion" class="block font-medium text-gray-900 dark:text-gray-300">Patarimai perkančiajam</label>
                <textarea type="text"  name="suggestion" id="suggestion" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
            </div>

            @php $features = collect(['reliability','engines','interior' ,'chassis','comfort','handling','practicality','power_economy']);
            @endphp


            <div class="flex flex-wrap mt-5">
            @foreach($features as $feature)
                <div class="form-group rating ">
                    <div for="rate" class="rate flex items-center">
                    <input type="radio" id="{{$feature}}5" name="{{$feature}}" value="5"/>
                    <label for="{{$feature}}5" title="text">5 stars</label>
                    <input type="radio" id="{{$feature}}4" name="{{$feature}}" value="4"/>
                    <label for="{{$feature}}4" title="text">4 stars</label>
                    <input type="radio" id="{{$feature}}3" name="{{$feature}}" value="3"/>
                    <label for="{{$feature}}3" title="text">3 stars</label>
                    <input type="radio" id="{{$feature}}2" name="{{$feature}}" value="2"/>
                    <label for="{{$feature}}2" title="text">2 stars</label>
                    <input type="radio" id="{{$feature}}1" name="{{$feature}}" value="1" checked="checked"/>
                    <label for="{{$feature}}1" title="text">1 star</label>
                    <p class="mb-3">{{$feature}}</p>
                    </div>
                 </div>
            @endforeach
            </div>

            <div class="flex md:justify-between  md:text-left text-center align-center flex-wrap py-5">

                <div class="custom-number-input md:w-1/6  my-2 mx-5 md:mx-0">
                    <label for="custom-input-number" class=" text-gray-700 font-semibold">Variklio Litražas
                    </label>
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class="decrement bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input type="number" min="0" name="engine_displacement"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="1">
                    <button data-action="increment" class="increment bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                    </div>
                </div>

                <div class="custom-number-input md:w-1/6 my-2 mx-5 md:mx-0">
                    <label for="custom-input-number" class="w-full text-gray-700  font-semibold">Sąnaudos mieste
                    </label>
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class="decrement bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input type="number" min="0" name="consumption_city"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="1.0">
                    <button data-action="increment" class="increment bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
                </div>

                <div class="custom-number-input md:w-1/5 my-2 mx-5 md:mx-0">
                    <label for="custom-input-number" class="w-full text-gray-700  font-semibold">Sąnaudos užmiestyje
                    </label>
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class="decrement bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input type="number" min="0" name="consumption_country"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="1.0">
                    <button data-action="increment" class="increment bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                </div>
                </div>

                <div class="custom-number-input md:w-1/6 my-2 mx-5 md:mx-0">
                    <label for="custom-input-number" class=" text-gray-700  font-semibold">Mišrios sąnaudos
                    </label>
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class="decrement bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input type="number" min="0"  name="consumption_mixed"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="1.0">
                    <button data-action="increment" class="increment bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                    </div>
                </div>

            </div>

            <div class="flex justify-center md:justify-start">
                <div class="select-model  mx-2">
                    <select class="form-select h-10 text-gray-700 font-semibold bg-gray-200 rounded shadow" id="fuel-select"  name="fuel_type" aria-label="Default select example">
                        <option class="bg-gray-100" value="Dyzelinas" >Dyzelinas</option>
                        <option class="bg-gray-100" value="Benzinas" >Benzinas</option>
                        <option class="bg-gray-100" value="Benzinas/Dujos" >Benzinas/Dujos</option>
                        <option class="bg-gray-100" value="Elektra" >Elektra</option>
                    </select>
                </div>

                <div class="select-model mx-2 ">
                    <select class="form-select h-10 text-gray-700 font-semibold bg-gray-200 rounded shadow" id="body-select"  name="body_type" aria-label="Default select example">
                        <option class="bg-gray-100" value="Sedanas" >Sedanas</option>
                        <option class="bg-gray-100" value="Hecbeckas" >Hečbeckas</option>
                        <option class="bg-gray-100" value="Universalas">Universalas</option>
                        <option class="bg-gray-100" value="Vienaturis" >Vienatūris</option>
                        <option class="bg-gray-100" value="Coupe" >Coupe</option>
                        <option class="bg-gray-100" value="Kabrioletas" >Kabrioletas</option>
                    </select>
                </div>

                <div class="select-gearbox mx-2 ">
                    <select class="form-select h-10 text-gray-700 font-semibold bg-gray-200 rounded shadow" id="gearbox-select"  name="gearbox_type" aria-label="Default select example">
                        <option class="bg-gray-100" value="Mechanine">Mechaninė</option>
                        <option class="bg-gray-100" value="Automatine">Automatinė</option>
                    </select>
                </div>
            </div>

            <div class=" images mt-3">
                <label for="images[]" class="block  text-gray-900 dark:text-gray-200">Nuotraukos</label>
                <input type="file" name="images[]" accept="image/*" multiple id="images" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100" >
            </div>

            <div class="recommend-selection">
                <p class="mb-2 ml-2">Ar rekomenduotumėte šį automobilį</p>
                <div class="flex">
                    <div class="flex items-center">
                        <input checked id="recommend" type="radio" value="Taip" name="recommend" class="hidden">
                        <label for="recommend" class="recommend-label ml-2  font-medium bg-slate-200 p-5 text-3xl rounded">Taip</label>
                    </div>
                    <div class="flex items-center">
                        <input id="not-recommend" type="radio" value="Ne" name="recommend" class="hidden">
                        <label for="not-recommend" class="not-recommend-label ml-2  font-medium bg-slate-200 p-5 text-3xl rounded">Ne</label>
                    </div>
                </div>

            </div>

            <button type="submit" class="text-white text-xl bg-zinc-500 p-2 hover:bg-gray-700 transition ease-in-out rounded ml-2 mt-3">Talpinti atsiliepimą</button>
        </form>
        @else
            <a href="{{route('login')}}">Login</a>
        @endif

    </div>

</x-app-layout>

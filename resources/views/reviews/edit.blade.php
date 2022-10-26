<x-app-layout>
    <div class="container lg:w-8/12 mx-auto ">

        @if (auth()->check())

           <form class="mt-5 md:mx-0 mx-3" enctype="multipart/form-data" method="POST" action="/review-edit/{{$review->id}}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="car-title text-2xl my-2">{{$review->CarMake->name}}  {{$review->CarModel->name}} {{$review->CarGeneration->name}}</div>

            <div class="">
                <label for="title" class="block font-medium text-gray-900 dark:text-gray-300">Atsiliepimo pavadinimas</label>
                <input value="{{$review->title}}" type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100" required>
            </div>
            <div class="block mb-2  font-medium text-gray-900 dark:text-gray-300">
                <label for="body" class="block  font-medium text-gray-900 dark:text-gray-300">Atsiliepimo aprašymas</label>
                <textarea value="{{$review->body}}" type="text" name="body" id="body" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{$review->body}}</textarea>
            </div>
            <div class="">
                <label for="positives" class="block font-medium text-gray-900 dark:text-gray-300">Automobilio pliusai</label>
                <input value="{{$review->positives}}" type="text" name="positives" id="positives" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100"  required>
            </div>
            <div class="">
                <label for="negatives" class="block   font-medium text-gray-900 dark:text-gray-300">Automobilio minusai</label>
                <input value="{{$review->negatives}}" type="text" name="negatives" id="negatives" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" maxlength="100"  required>
            </div>

            <div class="block font-medium text-gray-900 dark:text-gray-300">
                <label for="suggestion" class="block font-medium text-gray-900 dark:text-gray-300">Patarimai perkančiajam</label>
                <textarea type="text" name="suggestion" id="suggestion" class="bg-gray-50 border border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">{{$review->suggestion}}</textarea>
            </div>

            <div class="flex flex-wrap mt-5">


            @php $features = collect(['reliability','engines','interior' ,'chassis','comfort','handling','practicality','power_economy']);
            @endphp

            <div class="form-group rating ">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="reliability5" name="reliability" value="5" {{ ($review->reliability=="5")? "checked" : "" }}/>
                  <label for="reliability5" title="text">5 stars</label>
                  <input type="radio" id="reliability4" name="reliability" value="4" {{ ($review->reliability=="4")? "checked" : "" }}/>
                  <label for="reliability4" title="text">4 stars</label>
                  <input type="radio" id="reliability3" name="reliability" value="3" {{ ($review->reliability=="3")? "checked" : "" }}/>
                  <label for="reliability3" title="text">3 stars</label>
                  <input type="radio" id="reliability2" name="reliability" value="2" {{ ($review->reliability=="2")? "checked" : "" }}/>
                  <label for="reliability2" title="text">2 stars</label>
                  <input type="radio" id="reliability1" name="reliability" value="1" {{ ($review->reliability=="1")? "checked" : "" }}/>
                  <label for="reliability1" title="text">1 star</label>
                  <p class="mb-3">Patikimimumas</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="engines5" name="engines" value="5" {{ ($review->engines=="5")? "checked" : "" }}/>
                  <label for="engines5" title="text">5 stars</label>
                  <input type="radio" id="engines4" name="engines" value="4" {{ ($review->engines=="4")? "checked" : "" }}/>
                  <label for="engines4" title="text">4 stars</label>
                  <input type="radio" id="engines3" name="engines" value="3" {{ ($review->engines=="3")? "checked" : "" }}/>
                  <label for="engines3" title="text">3 stars</label>
                  <input type="radio" id="engines2" name="engines" value="2" {{ ($review->engines=="2")? "checked" : "" }}/>
                  <label for="engines2" title="text">2 stars</label>
                  <input type="radio" id="engines1" name="engines" value="1" {{ ($review->engines=="1")? "checked" : "" }}/>
                  <label for="engines1" title="text">1 star</label>
                  <p class="mb-3">Varikliai</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center ">
                  <input type="radio" id="interior5" name="interior" value="5" {{ ($review->interior=="5")? "checked" : "" }}/>
                  <label for="interior5" title="text">5 stars</label>
                  <input type="radio" id="interior4" name="interior" value="4" {{ ($review->interior=="4")? "checked" : "" }}/>
                  <label for="interior4" title="text">4 stars</label>
                  <input type="radio" id="interior3" name="interior" value="3" {{ ($review->interior=="3")? "checked" : "" }}/>
                  <label for="interior3" title="text">3 stars</label>
                  <input type="radio" id="interior2" name="interior" value="2" {{ ($review->interior=="2")? "checked" : "" }}/>
                  <label for="interior2" title="text">2 stars</label>
                  <input type="radio" id="interior1" name="interior" value="1" {{ ($review->interior=="1")? "checked" : "" }}/>
                  <label for="interior1" title="text">1 star</label>
                  <p class="mb-3">Interjero Kokybė</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="body5" name="chassis" value="5" {{ ($review->chassis=="5")? "checked" : "" }}/>
                  <label for="body5" title="text">5 stars</label>
                  <input type="radio" id="body4" name="chassis" value="4" {{ ($review->chassis=="4")? "checked" : "" }}/>
                  <label for="body4" title="text">4 stars</label>
                  <input type="radio" id="body3" name="chassis" value="3" {{ ($review->chassis=="3")? "checked" : "" }}/>
                  <label for="body3" title="text">3 stars</label>
                  <input type="radio" id="body2" name="chassis" value="2" {{ ($review->chassis=="2")? "checked" : "" }}/>
                  <label for="body2" title="text">2 stars</label>
                  <input type="radio" id="body1" name="chassis" value="1" {{ ($review->chassis=="1")? "checked" : "" }}/>
                  <label for="body1" title="text">1 star</label>
                  <p class="mb-3">Kėbulo Kokybė</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="comfort5" name="comfort" value="5" {{ ($review->comfort=="5")? "checked" : "" }}/>
                  <label for="comfort5" title="text">5 stars</label>
                  <input type="radio" id="comfort4" name="comfort" value="4" {{ ($review->comfort=="4")? "checked" : "" }}/>
                  <label for="comfort4" title="text">4 stars</label>
                  <input type="radio" id="comfort3" name="comfort" value="3" {{ ($review->comfort=="3")? "checked" : "" }}/>
                  <label for="comfort3" title="text">3 stars</label>
                  <input type="radio" id="comfort2" name="comfort" value="2" {{ ($review->comfort=="2")? "checked" : "" }}/>
                  <label for="comfort2" title="text">2 stars</label>
                  <input type="radio" id="comfort1" name="comfort" value="1" {{ ($review->comfort=="1")? "checked" : "" }}/>
                  <label for="comfort1" title="text">1 star</label>
                  <p class="mb-3">Komfortas</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="handling5" name="handling" value="5" {{ ($review->handling=="5")? "checked" : "" }}/>
                  <label for="handling5" title="text">5 stars</label>
                  <input type="radio" id="handling4" name="handling" value="4" {{ ($review->handling=="4")? "checked" : "" }}/>
                  <label for="handling4" title="text">4 stars</label>
                  <input type="radio" id="handling3" name="handling" value="3" {{ ($review->handling=="3")? "checked" : "" }}/>
                  <label for="handling3" title="text">3 stars</label>
                  <input type="radio" id="handling2" name="handling" value="2" {{ ($review->handling=="2")? "checked" : "" }}/>
                  <label for="handling2" title="text">2 stars</label>
                  <input type="radio" id="handling1" name="handling" value="1" {{ ($review->handling=="1")? "checked" : "" }}/>
                  <label for="handling1" title="text">1 star</label>
                  <p class="mb-3">Valdomumas</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="practicality5" name="practicality" value="5" {{ ($review->practicality=="5")? "checked" : "" }}/>
                  <label for="practicality5" title="text">5 stars</label>
                  <input type="radio" id="practicality4" name="practicality" value="4" {{ ($review->practicality=="4")? "checked" : "" }}/>
                  <label for="practicality4" title="text">4 stars</label>
                  <input type="radio" id="practicality3" name="practicality" value="3" {{ ($review->practicality=="3")? "checked" : "" }}/>
                  <label for="practicality3" title="text">3 stars</label>
                  <input type="radio" id="practicality2" name="practicality" value="2" {{ ($review->practicality=="2")? "checked" : "" }}/>
                  <label for="practicality2" title="text">2 stars</label>
                  <input type="radio" id="practicality1" name="practicality" value="1" {{ ($review->practicality=="1")? "checked" : "" }}/>
                  <label for="practicality1" title="text">1 star</label>
                  <p class="mb-3">Praktiškumas</p>
                </div>
            </div>

            <div class="form-group rating">
                <div for="rate" class="rate flex items-center">
                  <input type="radio" id="power_economy5" name="power_economy" value="5" {{ ($review->power_economy=="5")? "checked" : "" }}/>
                  <label for="power_economy5" title="text">5 stars</label>
                  <input type="radio" id="power_economy4" name="power_economy" value="4" {{ ($review->power_economy=="4")? "checked" : "" }}/>
                  <label for="power_economy4" title="text">4 stars</label>
                  <input type="radio" id="power_economy3" name="power_economy" value="3" {{ ($review->power_economy=="3")? "checked" : "" }}/>
                  <label for="power_economy3" title="text">3 stars</label>
                  <input type="radio" id="power_economy2" name="power_economy" value="2" {{ ($review->power_economy=="2")? "checked" : "" }}/>
                  <label for="power_economy2" title="text">2 stars</label>
                  <input type="radio" id="power_economy1" name="power_economy" value="1" {{ ($review->power_economy=="1")? "checked" : "" }}/>
                  <label for="power_economy1" title="text">1 star</label>
                  <p class="mb-3">Varikliai</p>
                </div>
            </div>
            </div>

            <div class="flex md:justify-between  md:text-left text-center align-center flex-wrap py-5">

                <div class="custom-number-input md:w-1/6  my-2 mx-5 md:mx-0">
                    <label for="custom-input-number" class=" text-gray-700 font-semibold">Variklio Litražas
                    </label>
                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class="decrement bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                        <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input type="number" min="0" name="engine_displacement"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="{{$review->engine_displacement}}">
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
                    <input type="number" min="0" name="consumption_city"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="{{$review->consumption_city}}">
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
                    <input type="number" min="0" name="consumption_country"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="{{$review->consumption_country}}">
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
                    <input type="number" min="0"  name="consumption_mixed"  class="outline-none focus:outline-none text-center w-full bg-gray-200 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center border-none text-gray-700  outline-none" value="{{$review->consumption_mixed}}">
                    <button data-action="increment" class="increment bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                    <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                    </div>
                </div>

            </div>

            <div class="flex justify-center md:justify-start">
                <div class="select-model  mx-2">
                    <select class="form-select h-10 text-gray-700 font-semibold bg-gray-200 rounded shadow" id="fuel-select"  name="fuel_type" aria-label="Default select example">
                        <option class="bg-gray-100" value="Dyzelinas" {{ ($review->fuel_type=="Dyzelinas")? "selected" : "" }}>Dyzelinas</option>
                        <option class="bg-gray-100" value="Benzinas" {{ ($review->fuel_type=="Benzinas")? "selected" : "" }}>Benzinas</option>
                        <option class="bg-gray-100" value="Benzinas/Dujos" {{ ($review->fuel_type=="Benzinas/Dujos")? "selected" : "" }}>Benzinas/Dujos</option>
                        <option class="bg-gray-100" value="Elektra" {{ ($review->fuel_type=="Elektra")? "selected" : "" }}>Elektra</option>
                    </select>
                </div>

                <div class="select-model mx-2 ">
                    <select class="form-select h-10 text-gray-700 font-semibold bg-gray-200 rounded shadow" id="body-select"  name="body_type" aria-label="Default select example">
                        <option class="bg-gray-100" value="Sedanas" {{ ($review->body_type=="Sedanas")? "selected" : "" }}>Sedanas</option>
                        <option class="bg-gray-100" value="Hecbeckas" {{ ($review->body_type=="Hecbeckas")? "selected" : "" }}>Hečbeckas</option>
                        <option class="bg-gray-100" value="Universalas" {{ ($review->body_type=="Universalas")? "selected" : "" }}>Universalas</option>
                        <option class="bg-gray-100" value="Vienaturis" {{ ($review->body_type=="Vienaturis")? "selected" : "" }}>Vienatūris</option>
                        <option class="bg-gray-100" value="Coupe" {{ ($review->body_type=="Coupe")? "selected" : "" }}>Coupe</option>
                        <option class="bg-gray-100" value="Kabrioletas" {{ ($review->body_type=="Kabrioletas")? "selected" : "" }}>Kabrioletas</option>
                    </select>
                </div>

                <div class="select-gearbox mx-2 ">
                    <select class="form-select h-10 text-gray-700 font-semibold bg-gray-200 rounded shadow" id="gearbox-select"  name="gearbox_type" aria-label="Default select example">
                        <option class="bg-gray-100" value="Mechanine">Mechaninė</option>
                        <option class="bg-gray-100" value="Automatine">Automatinė</option>
                    </select>
                </div>
            </div>

            <section class="flex flex-wrap flex-row">
                <div class="overflow-hidden text-gray-700">
                    <div class="container py-2 mx-auto ">
                      <div class="flex flex-wrap -m-1 md:-m-2">
                        <div class="flex flex-wrap ">
                            @foreach ($review->images as $image)
                          <div class="md:w-1/2 my-2 md:p-2">
                          <img src="/review_images/{{$image->image}}" class="block object-cover object-center w-full h-full rounded-lg">
                          <label for="deleteImage">Delete Image</label>
                          <input name="deleteImage[]" id="deleteImage" type="checkbox" multiple value="{{$image->id}}">
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
              </div>
            </section>

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

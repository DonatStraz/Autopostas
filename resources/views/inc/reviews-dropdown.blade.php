<div class="container mx-auto mt-5">
    <section class="search-section bg-no-repeat bg-center text-xl text-white">

        <form method="GET" action="{{ route('reviews.index')}}" class=" text-slate-500 mt-1 text-2xl p-2.5 flex flex-col  items-center my-5">

        <div class="flex">
            <div class="select-make ps-2">
                <select class="form-select rounded-l-sm h-10" id="make-select" name="make-select">
                    <option value="">Markė</option>
                    @foreach ($makes as $make)
                    <option value="{{$make->id}}">
                        {{$make->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="select-model">
                <select class="form-select h-10" id="model-select"  name="model-select" aria-label="Default select example">
                <option value="" selected>Modelis</option>
                </select>
            </div>

            <div class="select-year">
                <select class="form-select  h-10" id="generation-select" name="generation-select" aria-label="Default select example">
                <option value="" selected>Metai</option>
                </select>
            </div>
        </div>

        <div class="flex mt-2">

            <div class="flex items-center pr-2">
                <input id="" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Naudingi</label>
            </div>
            <div class="flex items-center pr-2">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vidutiniški</label>
            </div>
            <div class="flex items-center pr-2">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nenaudingi</label>
            </div>

            <div class="search relative ">
                <button id="search-btn" class="bg-zinc-500 text-white p-1.5 text-xl rounded-sm hover:bg-gray-700 transition ease-in-out">Ieškoti</button>
            </div>
        </div>

        </form>

    </section>
</div>

<div class="container mx-auto mt-5">
    <section class="search-section bg-no-repeat bg-center h-96 text-xl text-white" style="background-image: url('{{ asset('images/banner.jpg')}}');">
        <p class="text-3xl p-4">Autopostas.lt - Rask atsiliepimą apie dominanti automobili</p>
        <div class="flex flex-col  items-center my-5">
        <p class="text-3xl  text-white drop-shadow-lg shadow-black">Atsiliepimų paieška</p>

        <form method="GET" action="{{ route('cars.index')}}" class="flex text-slate-500 mt-1 text-2xl bg-zinc-500 bg-opacity-30 p-2.5">

            <div class="select-make ps-2 ">
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

            <div class="search relative">
                <button id="search-btn" class="bg-zinc-500 text-white w-10 p-1 hover:bg-gray-700 transition ease-in-out"><i class="fas fa-search"></i></button>
            </div>
        </form>

            <p id="review-results" class="mt-3">547 Atsiliepimų</p>

            <a href="{{ route('cars.index') }}" class="bg-zinc-500 hover:bg-opacity-80 p-2 mt-3"><i class="fa fa-plus"></i> Parašyti atsiliepimą</a>

        </div>
    </section>
</div>

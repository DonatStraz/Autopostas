<x-app-layout>
 <div class="container lg:w-6/12 mx-auto">
    @include('inc.car-info')

    <?php $count = 0; ?>
    <section class="images flex flex-wrap bg-zinc-400 mt-2">
     @foreach($cars as $car)
        @foreach($car->images as $image)
        <?php if($count == 6) break; ?>
            <img class="md:w-1/6 w-1/3 p-1 object-scale-down" src="{{ asset('storage/'.$image)}}">
        <?php $count++; ?>
        @endforeach
        </section>

        <section class="about bg-slate-50 mt-3 p-3">
            {{$car->about}}
        </section>
    @endforeach

    <div class="p-2 my-2 font-bold  text-3xl">Atsiliepimai</div>

    @include('inc.fetch-reviews')
 </div>
</x-app-layout>

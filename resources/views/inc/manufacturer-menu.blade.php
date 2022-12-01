<div class="flex container mx-auto justify-between">
    <div class="logo flex self-center">
    <a href="/" class="text-3xl"><h1>Auto<span>Post</span>.lt</h1></a>
    </div>
    <div class="manufacturer-list flex">

        <div class="hidden lg:flex ">
            @foreach ($makes->slice(0, 10) as $make)
            <a href="/automobiliai/?make-select={{$make->id}}"><img class="w-20" src="{{ asset('storage/'.$make->image)}}"></a>
            @endforeach
        </div>


        <div class="flex self-center">

            <div class="flex self-center">
             <button href="#" id="show-menu"><span class="mt-0.5">Visos markės</span><i class="fas fa-chevron-down text-xl"></i></button>
            </div>

            <div id="manufacturer-menu" tabindex="-1" aria-hidden="true" class="z-50 w-full h-full container overflow-y-auto hidden fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                <div class="relative p-4 md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded shadow dark:bg-gray-700 ">
                        <!-- Modal header -->
                                <div class="flex justify-between items-start">
                                    <button id="hide-menu" class="text-gray-400 p-2 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                        <p class="px-2">Suskleisti</p>
                                        <i class="fas fa-chevron-up text-xl"></i>
                                    </button>
                                </div>

                            <div class="flex p-5">
                                @foreach ($makes->slice(0, 10) as $make)
                                <div class="">
                                    <a href="/automobiliai/?make-select={{$make->id}}"><img src="{{ asset('storage/'.$make->image)}}"></a>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



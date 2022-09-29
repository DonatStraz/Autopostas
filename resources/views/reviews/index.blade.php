<x-app-layout>

    <div class="container lg:w-8/12 mx-auto">

        @include('inc.reviews-dropdown')

        <div class="review-cards">

        @include('inc.fetch-reviews')

        </div>
    </div>


</x-app-layout>

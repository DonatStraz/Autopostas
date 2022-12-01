@if(session()->has('message'))
<div class="fixed top-60 z-10 left-1/2 transform -translate-x-1/2 bg-zinc-400 text-white px-36 py-4 rounded shadow" id="confirmation-modal">
    <div class="text-xl">Ar tikrai norite pašalinti atsiliepimą <p>{{session('message')}}</p></div>
    <div class="flex justify-center">
        <a class="m-1 text-xl" href="review-delete/{{$review->id}}" id="confirm-confirmation">Taip</a>
        <a class="m-1 text-xl" href="#" id="close-confirmation">Ne</a>
    </div>
</div>

@endif

@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-amber-400  text-black px-36 py-4 rounded">
    <p>{{session('message')}}</p>
    </div>
@endif


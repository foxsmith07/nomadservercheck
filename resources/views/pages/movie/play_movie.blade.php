<x-layout>
    <h1 class="text-3xl">Movie to send</h1>

        <p class="my-8">Movie found:</p>
        @session('movies')
        <pre class="overflow-y-scroll bg-white rounded-sm shadow-xl p-4 w-[500px]" style="max-height: 500px">
            {{ session('movies') }} 
        </pre>
        @endsession

        <p class="text-red-500">MANCA IL CLICK SUL FILM PER SELEZIONARLO E PLAY</p>
        <button class="btn bg-red-400 text-white mt-10">play</button>
</x-layout>
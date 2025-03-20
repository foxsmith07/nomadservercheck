<x-layout>
    
    <div class="bg-slate-200 rounded-md shadow-xl p-5 text-slate-800 overflow-scroll">
        {{-- <livewire-check /> --}}
        <form action="{{route('file.submit')}}" method="POST" enctype="multipart/form-data" class="overflow-scroll">
            @csrf

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Insert PDF</legend>
                <input type="file" name="file" class="file-input" />
                <label class="fieldset-label">Max size 2MB</label>
            </fieldset>

            <button type="submit" class="btn btn-sm bg-blue-500 text-white hover:bg-blue-700">Submit</button>

            @session('text')

                <pre class="border p-4">{{$value}}</pre> 
            @endsession
        </form>
    </div>

</x-layout>
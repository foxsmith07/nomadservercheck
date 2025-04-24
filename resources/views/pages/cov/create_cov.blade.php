<x-layout>
    <h1 class="text-3xl mb-5">COV create</h1>

    <form action="{{route('cov.store')}}" method="POST" class="bg-white p-8 rounded-md max-w-[600px] shadow-xl">
        @csrf
        {{-- ? RIGA 1 --}}
        <div class="flex justify-between">
            <div class="">
                <label for="train_id" class="block mb-2">Train</label>
                <select name="train_id" id="train_id"
                    class="input-custom @error('train_id') outline-2 outline-red-400 @enderror">
                    <option disabled selected>select train</option>
                    @forelse ($trains as $train)
                        <option value="{{ $train->id }}">{{ $train->name }} ({{ $train->number }})</option>
                    @empty
                        <option>No train added yet</option>
                    @endforelse
                </select>
                @error('train_id')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="">
                <Label class="block mb-2" for="datetime">Date and Time</Label>
                <input type="text" name="datetime" class=" input-custom datepicker" style="padding: 10px !important" value="{{old('datetime')}}">
                @error('datetime')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="">
                <label for="resolved" class="block mb-2">Resolved</label>
                <select name="resolved" id="resolved" class="input-custom">
                    <option disabled selected>Select state</option>
                    <option value="yes" class="bg-green-200 text-green-800">Yes</option>
                    <option value="slow" class="bg-yellow-200 text-yellow-800">Yes, in part</option>
                    <option value="no" class="bg-red-200 text-red-800">No</option>
                </select>
                @error('resolved')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- ? RIGA 2 --}}
        <div class="mt-5 w-full">
            <Label class="block mb-2" for="request">Request</Label>
            <input type="text" name="request" id="request" class="input-custom w-full"
                style="padding: 10px !important" placeholder="es. Request Wifi Check">
            @error('request')
                <small class="text-red-600 block">{{ $message }}</small>
            @enderror
        </div>


        {{-- ? RIGA 3  --}}
        <div class="flex justify-between gap-10 mt-5">
            <div class="w-1/3">
                <label for="worker" class="block mb-2">Worker</label>
                <select id="worker" name="worker" class="input-custom w-full">
                    <option disabled selected>Select worker</option>
                    <option value="Walter">Walter</option>
                    <option value="Felice">Felice</option>
                    <option value="Fortunato">Fortunato</option>
                    <option value="Vincenzo">Vincenzo</option>
                    <option value="Andrea">Andrea</option>
                    <option value="Carla">Carla</option>
                </select>
                @error('worker')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="w-2/3">
                <label for="ticket" class="block mb-2">Ticket Number</label>
                <input type="text" id="ticket" name="ticket" class="input-custom w-full"
                    style="padding: 10px !important">
                @error('ticket')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- ? RIGA 4 --}}
        <div class="w-full mt-5">
            <label for="note" class="block m-2">Note</label>
            <textarea name="note" id="note" cols="30" rows="10" placeholder="Note" class="input-custom w-full"></textarea>
            @error('note')
                <small class="text-red-600 block">{{ $message }}</small>
            @enderror
        </div>

        <div class="w-full flex justify-end">
            <button type="submit" class="btn w-1/2 bg-blue-500 text-white hover:bg-blue-700 mt-5 rounded-md">Submit</button>
        </div>
    </form>
</x-layout>

<script type="text/javascript">
    flatpickr(".datepicker", {
        // dateFormat: "Y-m-d H:i:s",
        dateFormat: "d M Y- H:i",
        enableTime: true,
        time_24hr: true,
        minDate: "today", //a partire da
        locale: {
            "firstDayOfWeek": 1 //inizia il lunedi
        }
    });
</script>

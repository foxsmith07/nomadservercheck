<x-layout>
    <h1 class="text-3xl mb-5">COV edit <span class="text-blue-700">{{$cov->train->name}}</span></h1>

    <form action="{{route('cov.update', compact('cov'))}}" method="POST" class="bg-white p-8 rounded-md max-w-[600px] shadow-xl">
        @csrf
        @method('put')
        {{-- ? RIGA 1 --}}
        <div class="flex justify-between">
            <div class="">
                <label for="train_id" class="block mb-2">Train</label>
                <select name="train_id" id="train_id"
                    class="input-custom @error('train_id') outline-2 outline-red-400 @enderror">
                    {{-- <option disabled selected>select train</option> --}}
                    @forelse ($trains as $train)
                        <option value="{{ $train->id }}" {{$cov->train->number == $train->number ? 'selected' : ''}} >{{ $train->name }} ({{ $train->number }})</option>
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
                <input type="text" name="datetime" class=" input-custom datepicker" style="padding: 10px !important" value="{{$cov->datetime->format('d M Y - H:i')}}">
                @error('datetime')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="">
                <label for="resolved" class="block mb-2">Resolved</label>
                <select name="resolved" id="resolved" class="input-custom">
                    <option disabled selected>Select state</option>
                    <option value="yes" {{$cov->resolved == 'yes' ? 'selected' : ''}} class="bg-green-200 text-green-800">Yes</option>
                    <option value="slow" {{$cov->resolved == 'slow' ? 'selected' : ''}} class="bg-yellow-200 text-yellow-800">Yes, but..</option>
                    <option value="no" {{$cov->resolved == 'no' ? 'selected' : ''}} class="bg-red-200 text-red-800">No</option>
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
                style="padding: 10px !important" placeholder="es. Request Wifi Check" value="{{$cov->request}}">
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
                    <option value="Walter" {{$cov->worker == 'Walter' ? 'selected' : ''}} >Walter</option>
                    <option value="Felice" {{$cov->worker == 'Felice' ? 'selected' : ''}} >Felice</option>
                    <option value="Fortunato" {{$cov->worker == 'Fortunato' ? 'selected' : ''}} >Fortunato</option>
                    <option value="Vincenzo" {{$cov->worker == 'Vincenzo' ? 'selected' : ''}} >Vincenzo</option>
                    <option value="Andrea" {{$cov->worker == 'Andrea' ? 'selected' : ''}} >Andrea</option>
                    <option value="Carla" {{$cov->worker == 'Carla' ? 'selected' : ''}} >Carla</option>
                </select>
                @error('worker')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>

            <div class="w-2/3">
                <label for="ticket" class="block mb-2">Ticket Number</label>
                <input type="text" id="ticket" name="ticket" class="input-custom w-full"
                    style="padding: 10px !important" value="{{$cov->ticket}}">
                @error('ticket')
                    <small class="text-red-600 block">{{ $message }}</small>
                @enderror
            </div>
        </div>

        {{-- ? RIGA 4 --}}
        <div class="w-full mt-5">
            <label for="note" class="block m-2">Note</label>
            <textarea name="note" id="note" cols="30" rows="10" placeholder="Note" class="input-custom w-full">{{$cov->note}}</textarea>
            @error('note')
                <small class="text-red-600 block">{{ $message }}</small>
            @enderror
        </div>

        <div class="w-full flex justify-end">
            <button type="submit"
                class="btn w-1/2 bg-yellow-500 text-white hover:bg-yellow-700 mt-5 rounded-md">Save</button>
        </div>
    </form>
</x-layout>

<script type="text/javascript">
    flatpickr(".datepicker", {
        dateFormat: "d M Y - H:i",
        enableTime: true,
        time_24hr: true,
        minDate: "today", //a partire da
        locale: {
            "firstDayOfWeek": 1 //inizia il lunedi
        }
    });
</script>

<div>
    <label for="train">Seleziona un treno:</label>
    <select wire:model="selectedTrain" id="train">
        <option value="">-- Seleziona --</option>
        @foreach($trains as $train)
            <option value="{{ $train }}">{{ $train }}</option>
        @endforeach
    </select>

    @if ($selectedTrain)
        <iframe src="{{ asset('trains/' . $selectedTrain . '.pdf') }}" width="100%" height="600px"></iframe>
    @endif
</div>


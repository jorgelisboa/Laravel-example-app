<x-layout title="Who are the boys">

    <h1>WHO ARE THE BOYS?</h1>
    <a href="{{ route('character.create') }}">Add a new character?</a>

    <ul>
        @foreach ($characters as $character)
        <li>{{ $character->name }}</li>
        @endforeach
    </ul>

    {{-- Passar dados que existam no PHP pro JS --}}

    <script>
        const characters = {{ Js::from($characters) }};
    </script>

</x-layout>

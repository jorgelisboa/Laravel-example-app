<x-layout title="Who are the boys">

    <h1>WHO ARE THE BOYS?</h1>
    <a href="/character/create">Add a new character?</a>

    @isset($successMessage)
    <div>
        {{ $successMessage }}
    </div>
    @endisset

    <ul>
        @foreach ($characters as $character)
        <li>{{ $character->name }}
            <form action=" {{ route('character.destroy', $character->id) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('character.edit', $character->id) }}">Edit</a>
                <button>
                    Delete
                </button>
            </form>
        </li>
        @endforeach
    </ul>

    {{-- Passar dados que existam no PHP pro JS --}}

    <script>
        const characters = {{ Js::from($characters) }};
    </script>

</x-layout>

<x-layout title="New character">

    <h2>Add your character</h2>
    <form action="/character/save" method="post">
        @csrf
        <label for="name">Character name:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Continue</button>
    </form>

</x-layout>
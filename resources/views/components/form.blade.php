<form action=" {{ $action }} " method="post">
    @csrf

    @isset($name)
        @method('PUT')
        <h2>Edit your character</h2>
    @endisset

    <label for="name">Character name:</label>
    <input
        type="text"
        id="name"
        name="name"
        @isset($name) value="{{ $name }}" @endisset>

    <button type="submit">Continue</button>
</form>

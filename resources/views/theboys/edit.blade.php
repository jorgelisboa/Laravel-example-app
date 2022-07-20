<x-layout title="New character">
    <x-form :action="route('characters.update', $character->id)" :name="$character->name"></x-form>
</x-layout>

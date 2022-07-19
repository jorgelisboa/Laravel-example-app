<x-layout title="New character">
    <x-form :action="route('character.update', $character->id)" :name="$character->name"></x-form>
</x-layout>

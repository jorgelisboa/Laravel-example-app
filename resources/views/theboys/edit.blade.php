<x-layout title="New character">
    <x-form :action="route('character.store')" :name="$character->name"></x-form>
</x-layout>

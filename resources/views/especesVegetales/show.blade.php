<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'espèce végétale n° {{$especeVegetale->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <h1 class="font-bold text-2xl mb-5">{{$especeVegetale->nom}}</h1>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
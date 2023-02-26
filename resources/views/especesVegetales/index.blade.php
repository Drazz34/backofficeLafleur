<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nos espèces végétales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (count($especesVegetales) > 0 )

                    <table class="table-auto border">

                        <thead>

                            <tr class="border">

                                <th class="p-5">ID</th>
                                <th class="p-5">NOM</th>
                                <th class="p-5 mx-3 flex justify-between items-center">ACTIONS<x-btn-creer><a href="{{route('especesVegetales.create')}}">CREER</a></x-btn-creer></th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($especesVegetales as $especeVegetale)

                            <tr class="border text-center">

                                <td>{{$especeVegetale->id}}</td>
                                <td>{{$especeVegetale->nom}}</td>
                                <td class="p-5">

                                    <!-- lien Modifier -->
                                    @component('components.btn-modele')
                                    @slot('route')
                                    {{route('especesVegetales.edit', $especeVegetale->id)}}
                                    @endslot
                                    @slot('class')
                                    text-white bg-blue-600 hover:bg-blue-800 focus:bg-blue-800;
                                    @endslot
                                    @slot('title')
                                    Modifier
                                    @endslot
                                    @endcomponent

                                    <!-- lien Voir -->
                                    @component('components.btn-modele')
                                    @slot('route')
                                    {{route('especesVegetales.show', $especeVegetale->id)}}
                                    @endslot
                                    @slot('class')
                                    text-black bg-gray-200 hover:bg-gray-400 focus:bg-gray-400;
                                    @endslot
                                    @slot('title')
                                    Voir
                                    @endslot
                                    @endcomponent

                                    <x-btn-supprimer :action="route('especesVegetales.destroy', $especeVegetale->id)" />


                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                    @else

                    Il n'y a pas d'espèces végétales.

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier la couleur n° {{$couleur->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{route('couleurs.update', $couleur->id)}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-col max-w-lg">
                            <label for="nom_couleur" class="py-3 font-bold">Nom</label>
                            <input type="text" name="nom_couleur" id="nom_couleur" value="{{$couleur->nom_couleur}}">
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex py-5">
                            <button type="submit" class="btn-edit">Sauvegarder</button>
                            <a href="#" class="btn-show" onclick="document.getElementById('nom_couleur').value='{{$couleur->nom_couleur}}';">Annuler</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
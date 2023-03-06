<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Saisir un nouvel article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{route('articles.store')}}" method="POST" class="w-full max-w-lg p-5 bg-white shadow-md">
                        @csrf

                        <div class="form-group">
                            <label for="nom" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nom</label>
                            <input type="text" name="nom" id="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required >
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prix_unitaire" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Prix unitaire</label>
                            <input type="number" name="prix_unitaire" id="prix_unitaire" step="0.01" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required></textarea>
                            @error('prix_unitaire')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="espece_vegetale" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Espèce végétale</label>
                            <select name="espece_vegetale" id="espece_vegetale">
                                <option value="">Sélection</option>
                                @foreach($especesVegetales as $especeVegetale)
                                <option value="{{$especeVegetale->id}}">{{$especeVegetale->nom}}</option>
                                @endforeach
                            </select>
                            @error('espece_vegetale')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">CREER</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
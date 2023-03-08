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
                            <input type="text" name="nom" id="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" required>
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="prix_unitaire" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Prix unitaire</label>
                            <input type="number" name="prix_unitaire" id="prix_unitaire" step="0.01" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            @error('prix_unitaire')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="categorie">Catégorie</label>
                            @foreach($categories as $categorie)
                            <div class="flex items-center mb-3">
                                <input type="checkbox" name="categories[]" value="{{ $categorie->id }}" id="categorie_{{ $categorie->id }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <label for="categorie_{{ $categorie->id }}" class="ml-2 block text-gray-900">
                                    {{ $categorie->nom }}
                                </label>
                            </div>
                            @endforeach
                            @error('categories')
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="espece_vegetale" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Espèce végétale</label>
                            <select name="espece_vegetale" id="espece_vegetale" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Sélection</option>
                                @foreach($especesVegetales as $especeVegetale)
                                <option value="{{$especeVegetale->id}}">{{$especeVegetale->nom}}</option>
                                @endforeach
                            </select>
                            @error('espece_vegetale')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="couleur" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Couleur</label>
                            <select name="couleur" id="couleur" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Sélection</option>
                                @foreach($couleurs as $couleur)
                                <option value="{{$couleur->id}}">{{$couleur->nom_couleur}}</option>
                                @endforeach
                            </select>
                            @error('couleur')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantite_dispo" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Quantité</label>
                            <input type="number" name="quantite_dispo" id="quantite_dispo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                            @error('quantite_dispo')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unite" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Unité</label>
                            <select name="unite" id="unite" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="">Sélection</option>
                                @foreach($unites as $unite)
                                <option value="{{$unite->id}}">{{$unite->nom}}</option>
                                @endforeach
                            </select>
                            @error('unite')
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
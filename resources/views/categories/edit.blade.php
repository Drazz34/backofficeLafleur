<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier la catégorie n° {{$categorie->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{route('categories.update', $categorie->id)}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-col max-w-lg">
                            <label for="nom" class="py-3 font-bold">Nom</label>
                            <input type="text" name="nom" id="nom_edit" value="{{$categorie->nom}}">
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col max-w-lg">
                            <label for="description" class="py-3 font-bold">Description</label>
                            <textarea name="description" id="description_edit" value="{{$categorie->description}}">{{$categorie->description}}</textarea>
                            @error('description')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col max-w-lg">
                            <label for="photo" class="py-3 font-bold">Photo</label>
                            <p>Image actuelle : {{$categorie->photo}}</p>
                            <input type="file" name="photo" id="photo_edit" value="{{$categorie->photo}}" accept="image/png, image/jpeg">
                            @error('photo')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col max-w-lg">
                            <label for="alt" class="py-3 font-bold">Alt</label>
                            <input type="text" name="alt" id="alt_edit" value="{{$categorie->alt}}">
                            @error('alt')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex py-5">
                            <button type="submit" class="btn-edit">Sauvegarder</button>
                            <a href="#" class="btn-show" onclick="document.getElementById('nom').value='{{$categorie->nom}}';">Annuler</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>

<?php var_dump($categorie->description);
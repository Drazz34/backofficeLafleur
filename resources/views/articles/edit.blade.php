<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier l'article n° {{$article->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{route('articles.update', $article->id)}}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-col max-w-lg">
                            <label for="nom" class="py-3 font-bold">Nom</label>
                            <input type="text" name="nom" id="nom" value="{{$article->nom}}" class="cursor-not-allowed" readonly>
                            @error('nom')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col max-w-lg">
                            <label for="quantite_dispo" class="py-3 font-bold">Quantité en stock</label>
                            <input type="text" name="quantite_dispo" id="quantite_dispo" value="{{$article->quantite_dispo}}" class="cursor-not-allowed" readonly>
                            @if($article->quantite_dispo < 10) <div class="text-red-500 font-bold">Attention: quantité en stock inférieure à 10.
                            </div>

                            @endif
                            @error('quantite_dispo')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="flex flex-col max-w-lg">
                            <label for="quantite" class="py-3 font-bold">Quantité à ajouter ou retrancher</label>
                            <input type="number" name="quantite" id="quantite">
                            @error('quantite')
                            <div class="text-red-500">{{$message}}</div>
                            @enderror
                        </div>



                        <div class="flex py-5">
                            <button type="submit" class="btn-edit">Sauvegarder</button>
                            <a href="#" class="btn-show" onclick="document.getElementById('nom').value='{{$article->nom}}'; document.getElementById('quantite_dispo').value='{{$article->quantite_dispo}}'; document.getElementById('quantite').value='';">Annuler</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
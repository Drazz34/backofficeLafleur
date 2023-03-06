<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'article n° {{$article->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <h1 class="font-bold text-2xl mb-5">{{$article->nom}}</h1>

                <div class="flex">

                        <h3>
                            <ul class="flex">
                                @foreach($article->categories as $categorie)
                                <li class="m-2 text-xl bg-orange-200 max-w-none p-2 rounded-lg"><a href="{{route('categories.show', $categorie->id)}}">{{$categorie->nom}}</a></li>
                                @endforeach
                            </ul>
                        </h3>

                        <h3>
                            <div class="flex">
                                <p class="m-2 text-xl bg-red-200 max-w-none p-2 rounded-lg">{{$article->prix_unitaire}}€</p>
                            </div>   
                        </h3>

                        <h3>
                            <div class="flex">
                                <p class="m-2 text-xl bg-blue-200 max-w-none p-2 rounded-lg">Quantité : {{$article->quantite_dispo}}</p>
                            </div>   
                        </h3>

                        <h3>
                            <div class="flex">
                                <p class="m-2 text-xl bg-pink-200 max-w-none p-2 rounded-lg">{{$article->especeVegetale->nom}}</p>
                            </div>   
                        </h3>

                    </div>
                    
                    <div class="flex justify-end">
                        <a href="{{route('articles.edit', $article->id)}}" class="btn-edit">Quantité</a>
                        <x-btn-supprimer :action="route('articles.destroy', $article->id)" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
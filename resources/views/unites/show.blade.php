<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de l'unité n° {{$unite->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="font-bold text-2xl mb-5">{{$unite->nom}}</h1>

                    <p class="p-5">Liste des articles de cette unité</p>

                    <p>

                    <ul>
                        @foreach ($articles as $article)

                        <li class="p-1">- <a href="{{route('articles.show', $article->id)}}">{{$article->nom}}</a></li>

                        @endforeach
                    </ul>

                    </p>

                    <div class="flex justify-end">
                        <a href="{{route('unites.edit', $unite->id)}}" class="btn-edit">Modifier</a>
                        <x-btn-supprimer :action="route('unites.destroy', $unite->id)" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
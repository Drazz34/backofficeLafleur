<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de la commande n° {{$commande->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    
                    <h3>
                        <div class="flex">
                            <p class="m-2 text-xl max-w-none p-2 rounded-lg"><strong>Article</strong> :<br> {{$commande->article->nom}}</p>
                        </div>
                    </h3>

                    <h3>
                        <div class="flex">
                            <p class="m-2 text-xl max-w-none p-2 rounded-lg"><strong>Client</strong> :<br> Prénom : {{$commande->client->prenom}}<br> Nom : {{$commande->client->nom}}<br> Email : {{$commande->client->email}}</p>
                        </div>
                    </h3>

                    <h3>
                        <div class="flex">
                            <p class="m-2 text-xl max-w-none p-2 rounded-lg"><strong>Adresse de livraison</strong> :<br> {{$commande->adresse->rue}}<br>{{$commande->adresse->codePostal->code_postal}} {{$commande->adresse->ville->nom_ville}}</p>
                        </div>
                    </h3>

                    <h3>
                        <div class="flex">
                            <p class="m-2 text-xl max-w-none p-2 rounded-lg"><strong>Date de commande</strong> :<br> {{$commande->date_commande}}</p>
                        </div>
                    </h3>

                    <h3>
                        <div class="flex">
                            <p class="m-2 text-xl max-w-none p-2 rounded-lg"><strong>Date de livraison souhaitée</strong> :<br> {{$commande->date_livraison_souhaitee}}</p>
                        </div>
                    </h3>

                    <h3>
                        <div class="flex">
                            <p class="m-2 text-xl max-w-none p-2 rounded-lg"><strong>Quantité</strong> :<br> {{$commande->quantite}}</p>
                        </div>
                    </h3>

                    
                    <div class="flex justify-end">
                        <x-btn-supprimer :action="route('commandes.destroy', $commande->id)" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
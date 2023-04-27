<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nos commandes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-row flex-wrap">

                    @if (count($commandes) > 0 )

                    <div class="w-full lg:w-1/2 pr-4">

                        <h3 class="font-semibold">Commandes en cours à livrer</h3><br>

                        <table class="table-auto border">

                            <thead>

                                <tr class="border">

                                    <th class="p-5">ID</th>
                                    <th class="p-5">ARTICLE</th>
                                    <th class="p-5 mx-3 flex justify-between items-center">ACTIONS</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($commandesAVenir as $commande)

                                <tr class="border text-center">

                                    <td>{{$commande->id}}</td>
                                    <td><strong>{{$commande->article->nom}}</strong>
                                        @if($commande-> gainLoterie)
                                        <br>Lot : {{$commande-> gainLoterie->lot}}
                                        @endif
                                        <br>à livrer le : {{$commande->date_livraison_souhaitee}}
                                    </td>
                                    <td class="p-5">

                                        <!-- lien Voir -->
                                        @component('components.btn-modele')
                                        @slot('route')
                                        {{route('commandes.show', $commande->id)}}
                                        @endslot
                                        @slot('class')
                                        text-black bg-gray-200 hover:bg-gray-400 focus:bg-gray-400;
                                        @endslot
                                        @slot('title')
                                        Voir
                                        @endslot
                                        @endcomponent

                                        <x-btn-supprimer :action="route('commandes.destroy', $commande->id)" />


                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>
                        <br>
                    </div>


                    <div class="w-full lg:w-1/2">

                        <h3 class="font-semibold">Commandes passées</h3><br>

                        <table class="table-auto border bg-beige-100">

                            <thead>

                                <tr class="border">

                                    <th class="p-5">ID</th>
                                    <th class="p-5">ARTICLE</th>
                                    <th class="p-5 mx-3 flex justify-between items-center">ACTIONS</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($commandesLivrees as $commande)

                                <tr class="border text-center">

                                    <td>{{$commande->id}}</td>
                                    <td><strong>{{$commande->article->nom}}</strong>
                                        @if($commande->gainLoterie)
                                        <br>Lot : {{$commande->gainLoterie->lot}}
                                        @endif<br> livrée le : {{$commande->date_livraison_souhaitee}}
                                    </td>

                                    <td class="p-5">

                                        <!-- lien Voir -->
                                        @component('components.btn-modele')
                                        @slot('route')
                                        {{route('commandes.show', $commande->id)}}
                                        @endslot
                                        @slot('class')
                                        text-black bg-gray-200 hover:bg-gray-400 focus:bg-gray-400;
                                        @endslot
                                        @slot('title')
                                        Voir
                                        @endslot
                                        @endcomponent

                                        <x-btn-supprimer :action="route('commandes.destroy', $commande->id)" />


                                    </td>

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                    @else

                    Il n'y a pas de commandes.

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
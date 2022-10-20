<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="active list-group-item list-group-item-action">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="list-group-item list-group-item-action bg-light">Mesas</a>
            <a href="../cozinha" class="list-group-item list-group-item-action bg-light">Cozinha</a>
        </x-slot>
        <x-slot name="content">
            <div class="col-xs-6 m-2">
                <a href="/comanda/create" class="btn btn-success"><span>Adicionar Comanda</span></a>
            </div>
            <div class="m-3">
            @foreach ($comandas as $comanda)
            <a href="/comanda/{{ $comanda->id }}">
                <div id="comanda{{ $comanda->id }}" class="p-3 md:w-1/3 flex flex-col flex-grow flex-shrink inline-flex" style="width: 300px;cursor:pointer;">
                    <div style="box-shadow: 0px 8px 33px -2px rgb(0 0 0/ 53%);">
                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
                            <p class="w-full text-gray-600 text-xs md:text-sm px-6 pb-2">
                                <time>{{ $comanda->created_at->diffForHumans() }}</time>
                                
                            <p>

                            <div class="w-full font-bold text-xl text-gray-900 px-6">
                                <p>
                                    Comanda - {{ $comanda->id }}
                                </p>
                            </div>

                            <div class="max-h-32 text-sm text-gray-800 font-serif text-base px-6 mb-5">
                                
                                <p>
                                    Mesa: {{ $comanda->table->number }}
                                </p>

                                <p>
                                    Entrada: <time>{{ $comanda->created_at->toTimeString() }}</time>
                                </p>

                            </div>
                        </div>
                        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
                            <div class="flex items-center justify-between">
                                <div class="ml-3">
                                    <h5 class="font-bold">
                                        <p>{{ $comanda->waiter->name }}</p>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
            </div>
        </x-slot>
    </x-sidebar>
</x-app-layout>
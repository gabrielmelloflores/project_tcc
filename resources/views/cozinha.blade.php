<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="list-group-item list-group-item-action bg-light">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="list-group-item list-group-item-action bg-light">Mesas</a>
            <a href="../cozinha" class="active list-group-item list-group-item-action">Cozinha</a>
        </x-slot>
        <x-slot name="content">
                Cozinhas
        </x-slot>
    </x-sidebar>
</x-app-layout>
<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="active list-group-item list-group-item-action">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="list-group-item list-group-item-action bg-light">Mesas</a>
            <a href="../cozinha" class="list-group-item list-group-item-action bg-light">Cozinha</a>
        </x-slot>
        <x-slot name="content">
                Comanda
        </x-slot>
    </x-sidebar>
</x-app-layout>
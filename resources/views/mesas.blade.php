<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="list-group-item list-group-item-action bg-light">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="active list-group-item list-group-item-action">Mesas</a>
            <a href="../cozinha" class="list-group-item list-group-item-action bg-light">Cozinha</a>
        </x-slot>
        <x-slot name="content">
            Mesas
        </x-slot>
    </x-sidebar>
</x-app-layout>
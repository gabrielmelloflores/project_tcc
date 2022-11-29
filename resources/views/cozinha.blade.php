<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="list-group-item list-group-item-action bg-light">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="list-group-item list-group-item-action bg-light">Mesas</a>
            <a href="../cozinha" class="active list-group-item list-group-item-action">Cozinha</a>
        </x-slot>
        <x-slot name="content">
        <div class="m-3">

        @foreach ($comandas as $comanda)
            <!-- Row 1 -->
            @php 
                    $quantidade = 0; 
                    $delivered = 0;
            @endphp
            @foreach ($comanda->itens as $item)
                @php 
                    $quantidade += $item->quantity; 
                    $delivered += $item->delivered;
                @endphp
            @endforeach
                @if($quantidade != $delivered)
                    
            
                    <div class="m-1 md:w-1/4 flex flex-col flex-grow flex-shrink inline-flex">

                        <div class="card ">
                            <div class="card-body">
                            <h5 class="card-title">Comanda - {{$comanda->id}}</h5>
                            <ul class="list-group">
                                @foreach ($comanda->itens as $item)
                                    @if(($item->quantity - $item->delivered) > 0)
                                        <li class="list-group-item list-group-item-success">@php echo($item->quantity - $item->delivered); @endphp - {{ $item->product->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                            </div>
                            <div class="card-footer">
                                <time>{{ $comanda->created_at}}</time>
                            </div>
                        </div>
                        </div>
                        @endif
            @endforeach
            </div>
        </x-slot>
    </x-sidebar>
</x-app-layout>
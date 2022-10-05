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
                <a href="#addComandaModal" class="btn btn-success" data-toggle="modal"><span>Adicionar Comanda</span></a>
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

            <!-- ADD Modal HTML -->
            <div id="addComandaModal" class="modal fade">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content ">
                        <form method="POST" action="/comanda" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">						
                                <h4 class="modal-title">Adicionar Comanda</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">{{ $comanda->waiter->name }}</div>

                                <div class="form-group" style="display:flex;">
                                    <div>
                                        <label>Mesa</label>
                                        <select name="table_id" class="form-select">
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}">{{ $table->number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="margin-left:100px;display: inline-flex;">
                                        <label>Anexar Mesa</label>
                                        <button style="margin-left:5px;" type="button" class="addMesa btn btn-success">+</button>
                                        <div style="margin-left:10px" id="boxMesa"></div>
                                    </div>
                                </div>           
                                <div class="form-group">
                                    <h4>Pedido</h4>

                                    <table id="tableProdutos" class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope = "col"> Produto </th>
                                                <th scope = "col"> Preço </th>
                                                <th scope = "col"> Quantidade </th>
                                                <th scope = "col"> Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th> 
                                                    <select id="selectProduto" class="form-select">
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select> 
                                                </th>
                                                <td> <button type="button" class="btn btn-success addProduto">Add Produto</button></td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                        <tfoot style="background-color: #ddd;">
                                            <tr>
                                                <th scope = "col" >Total</th>
                                                <td scope = "col">  </td>
                                                <td scope = "col">  </td>
                                                <td id="total" scope = "col"> R$ 0,00 </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <button class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

             <!-- Edit Modal HTML -->
             <div id="editComandaModal" class="modal fade">
                <div class="modal-dialog  modal-xl">
                    <div class="modal-content ">
                        <form method="POST" action="/comanda" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">						
                                <h4 class="modal-title">Comanda - {{ $comanda->id }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group" id="waiter"></div>

                                <div class="form-group" style="display:flex;">
                                    <div>
                                        <label>Mesa</label>
                                        <select id="mesa" name="table_id" class="form-select">
                                            @foreach ($tables as $table)
                                                <option value="{{ $table->id }}">{{ $table->number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="margin-left:100px;display: inline-flex;">
                                        <label>Anexar Mesa</label>
                                        <button style="margin-left:5px;" type="button" class="addMesa btn btn-success">+</button>
                                        <div style="margin-left:10px" id="boxMesa"></div>
                                    </div>
                                </div>           
                                <div class="form-group">
                                    <h4>Pedido</h4>

                                    <table id="tableProdutos" class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope = "col"> Produto </th>
                                                <th scope = "col"> Preço </th>
                                                <th scope = "col"> Quantidade </th>
                                                <th scope = "col"> Total </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th> 
                                                    <select id="selectProduto" class="form-select">
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select> 
                                                </th>
                                                <td> <button type="button" class="btn btn-success addProduto">Add Produto</button></td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                        <tfoot style="background-color: #ddd;">
                                            <tr>
                                                <th scope = "col" >Total</th>
                                                <td scope = "col">  </td>
                                                <td scope = "col">  </td>
                                                <td id="total" scope = "col"> R$ 0,00 </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <button class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <script>
            @foreach ($comandas as $comanda) 
                $('#comanda'+{{ $comanda->id }}).click(function(){
                    $('#editComandaModal').modal('show');
                    $('#editComandaModal #waiter').html("{{ $comanda->waiter->name }}");
                    $('#editComandaModal #mesa').val({{ $comanda->table_id }});
                    @foreach ($comanda->itens as $item)
                            var html = "<tr row='{{ $item->product->id }}'>"
                                    +     "<th> <input type='text' class='hidden' name='product_id{{ $item->product->id }}' value='{{ $item->product->id }}'></input>{{ $item->product->name }} </th>"
                                    +     "<td> R$ {{ $item->product->value }}</td>"
                                    +     "<td> <input class='quant' valor='{{$item->product->value }}' style='width: 100px;' type='number' name='quantity{{ $item->product->id }}' class='form-control' value='{{ $item->quantity }}'></td>"
                                    +     "<td> <span id='valor{{ $item->product->id }}' >R$ <span>"+parseInt({{ $item->product->value }}) * parseInt({{ $item->quantity }})+"</span></span> </td>"
                                    + "</tr>"
                        $('#editComandaModal #tableProdutos tbody').prepend(html);
                    @endforeach
                });
            @endforeach

            

        </script>

        </x-slot>
    </x-sidebar>
</x-app-layout>
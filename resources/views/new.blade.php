<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="active list-group-item list-group-item-action">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="list-group-item list-group-item-action bg-light">Mesas</a>
            <a href="../cozinha" class="list-group-item list-group-item-action bg-light">Cozinha</a>
        </x-slot>
        <x-slot name="content">

            <div class="m-3">
                <form method="POST" action="/comanda" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header" style="padding:0px">
                        <a href="../comanda"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></a>
                        <h4 class="modal-title">Comanda</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group" id="waiter">
                            {{ Auth::user()->name }}
                        </div>

                        <div class="form-group" style="display:flex;">
                            <div style=" align-self: center; ">
                                <label>Mesa</label>
                                <select id="mesa" name="table_id" class="form-select">
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-left:100px;display: block;">
                                <label>Anexar Mesa</label>
                                <button style="margin-left:5px;" type="button" class="addMesa btn btn-success">+</button>
                                <div style="display:inline-flex" id="boxMesa">
                                </div>
                            </div>
                        </div>           
                        <div class="form-group">
                            <h4>Pedido</h4>

                            <table id="tableProdutos" class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope = "col"> Produto </th>
                                        <th scope = "col"> Pre??o </th>
                                        <th scope = "col"> Quantidade </th>
                                        <th scope = "col"> Entregue </th>
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
                                        <td> </td>
                                    </tr>
                                </tbody>
                                <tfoot style="background-color: #ddd;">
                                    <tr>
                                        <th scope = "col" >Total</th>
                                        <td scope = "col">  </td>
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
            <script>
                function alteraQuant(){
                    $('.maisQuant').click(function(){
                        var tr = $(this).closest('tr').attr('row');
                        var td = $(this).closest('td').attr('tipo');
                        $('#'+td+tr).val(parseInt($('#'+td+tr).val())+1);
                    });

                    $('.menosQuant').click(function(){
                        var tr = $(this).closest('tr').attr('row');
                        var td = $(this).closest('td').attr('tipo');
                        $('#'+td+tr).val(parseInt($('#'+td+tr).val())-1);
                    });
                };

                function alteraTotais(){
                    $('.quant').click(function(){
                        var soma = 0;
                        var valor = $(this).closest('td').attr('valor');
                        var tr = $(this).closest('tr').attr('row');
                        var quantidade = $('#quantidade'+tr).val();
                        $('#valor'+tr).html("R$ <span>"+quantidade * valor+"</span>");     
                        $('tbody tr td:last-child span span').each(function( index ) {
                            soma += parseFloat($(this)[0].innerText);
                        });
                        $('#total').html('R$ '+soma);
                    });
                };

                $(document).ready(function(){
                    @foreach ($comandas as $comanda)
                        @if($comanda->table)
                            $("#mesa option[value='{{ $comanda->table->id }}']").remove();
                        @endif
                    @endforeach
                    alteraQuant();
                    alteraTotais();
                });

                $('.addProduto').click(function(){
                    @foreach ($products as $product)
                        if($('#selectProduto').val() == {{ $product->id }}){
                            var html = "<tr row='{{ $product->id }}'>"
                                    +     "<th> <input type='text' class='hidden' name='product_id{{ $product->id }}' value='{{ $product->id }}'></input>{{ $product->name }} </th>"
                                    +     "<td> R$ {{ $product->value }}</td>"
                                    +     '<td tipo="quantidade" valor="{{ $product->value }}">'
                                    +                '<button type="button" style=" font-size: 10px; padding: 5px; margin-right: 9px;" class="menosQuant quant btn btn-danger"><i class="fa-solid fa-minus"></i></button>'
                                    +                '<input style=" background-color: transparent; width: 50px; " type="text" id="quantidade{{ $product->id }}" name="quantity{{ $product->id }}" value="1"></input>'
                                    +                '<button type="button" style=" font-size: 10px; padding: 5px; margin-left: 9px;" class="maisQuant quant btn btn-success"><i class="fa-solid fa-plus"></i></button>'
                                    +            '</td>'
                                    +     '<td tipo="total">' 
                                    +        '<button type="button" style=" font-size: 10px; padding: 5px; margin-right: 5px;" class="menosQuant btn btn-danger"><i class="fa-solid fa-minus"></i></button>'
                                    +        '<input style=" background-color: transparent; width: 50px; " type="text" id="total{{ $product->id }}" name="delivered{{ $product->id }}" value="0"></input>'
                                    +        '<button type="button" style=" font-size: 10px; padding: 5px; margin-left: 5px;" class="maisQuant btn btn-success"><i class="fa-solid fa-plus"></i></button>'
                                    +     '</td>'
                                    +     "<td> <span id='valor{{ $product->id }}' >R$ <span>{{ $product->value }}</span></span> </td>"
                                    + "</tr>"
                        }
                    @endforeach
                    $('#tableProdutos tbody').prepend(html);
                    $('.maisQuant').unbind();
                    $('.menosQuant').unbind();
                    $('.quant').unbind();
                    alteraQuant();
                    alteraTotais();
                    $( '.quant' ).trigger( "click" );

                });

                $('.addMesa').click(function(){

                    if ($('#boxMesa select:last-child').attr('mesa') != undefined){
                        var mesa = parseInt($('#boxMesa select:last-child').attr('mesa'))+1;
                    }else{
                        var mesa = 0;
                    }
                    var html = '<select style="margin-left:5px" name="table_id'+mesa+'" mesa="'+mesa+'" class="form-select">'
                            +'    @foreach ($tables as $table)'
                            +'        <option value="{{ $table->id }}">{{ $table->number }}</option>'
                            +'    @endforeach'
                            +'</select>';

                    $('#boxMesa').append(html);

                });
            </script>
        </x-slot>
    </x-sidebar>
</x-app-layout>
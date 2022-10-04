<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="list-group-item list-group-item-action bg-light">Comanda</a>
            <a href="../produtos" class="list-group-item list-group-item-action bg-light">Produtos</a>
            <a href="../mesas" class="active list-group-item list-group-item-action">Mesas</a>
            <a href="../cozinha" class="list-group-item list-group-item-action bg-light">Cozinha</a>
        </x-slot>
        <x-slot name="content">
        <div class="col-xs-6">
            <a href="#addMesaModal" class="btn btn-success" data-toggle="modal"><span>Adicionar Mesas</span></a>
        </div>
        <div class="m-3">
            @foreach ($tables as $table)
                @if($table->active == 0)
                    <div id="{{ $table->id }}" class="card mb-3" style="max-width: 240px; min-width:100px; display:inline-flex; background-color: #9e9e9e; cursor: pointer;">
                @else
                    <div id="{{ $table->id }}" class="card mb-3" style="max-width: 240px; min-width:100px; display:inline-flex; background-color: white; cursor: pointer;">
                @endif
                    <div class="g-0" style="display: flex;">
                        <div class="col-md-4" style="border-right: 1px solid #ddd; display: flex; min-width:75px;">
                            <div style="margin: auto; font-weight: bold; font-size: 20px;">
                                {{ $table->number }}
                            </div>
                        </div>
                        <div class="col-md-8" style="display:contents;">
                        <div class="card-body" style="min-width:100px;">
                            <p class="card-title"><i class="fa-sharp fa-regular fa-circle-user"></i> {{ $table->seats }}</p>
                            @if($table->anexo)
                                <p><i class="fa-solid fa-link"></i> {{ $table->anexo }}</p>
                            @endif
                        </div>
                        </div>
                    </div>
                </div>
                <script>
                    $("#{{ $table->id }}").click(function() {
                        $('#editMesaModal').modal('show');
                        $('#editMesaModal #id').val("{{ $table->id }}");
                        $('#editMesaModal #number').val("{{ $table->number }}");
                        $('#editMesaModal #seats').val("{{ $table->seats }}");
                        $('#editMesaModal #editActive').prop('checked', {{ $table->active }}).trigger('change');
                        $('#editMesaModal #form').attr('action', '/mesas/{{ $table->id }}');
                        $('#editMesaModal #delet').attr('action', '/mesas/{{ $table->id }}');
                    });
                </script>
            @endforeach
        </div>
            <!-- ADD Modal HTML -->
            <div id="addMesaModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="/mesas" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">						
                                <h4 class="modal-title">Adicionar Mesa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">					
                                <div class="form-group">
                                    <label>Número da mesa?</label>
                                    <input type="text" name="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Quantidade de lugares</label>
                                    <input type="number" name="seats" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="active" id="active">
                                        <label class="custom-control-label" for="active"> Disponível</label>
                                    </div>
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

            <!-- EDIT Modal HTML -->
            <div id="editMesaModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="form" method="POST" action="/mesas/edit" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-header">						
                                <h4 class="modal-title">Editar Mesa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="hidden">
                                    <input type="text" name="id" id="id" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Número da mesa?</label>
                                    <input type="text" name="number" id="number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Quantidade de lugares</label>
                                    <input type="number" name="seats" id="seats" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="active" id="editActive">
                                        <label class="custom-control-label" for="editActive"> Disponível</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <form id="delet" method="POST" action="">
                                    @csrf
                                    @method('DELETE')

                                    <button class="delete" style="color: rgb(243, 47, 47); position: absolute; left: 5px;"><i class="material-icons" data-toggle="tooltip" title="Delete">Deletar</button>
                                </form>
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                                <button class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </x-slot>
    </x-sidebar>
</x-app-layout>
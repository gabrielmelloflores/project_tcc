<x-app-layout>
    <x-sidebar>
        <x-slot name="menu">
            <a href="../comanda" class="list-group-item list-group-item-action bg-light">Comanda</a>
            <a href="../produtos" class="active list-group-item list-group-item-action">Produtos</a>
            <a href="../mesas" class="list-group-item list-group-item-action bg-light">Mesas</a>
            <a href="../cozinha" class="list-group-item list-group-item-action bg-light">Cozinha</a>
        </x-slot>
        <x-slot name="content">
            <!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	// $('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2><b>Pratos</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Novo</span></a>
							{{-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Deletar</span></a>						 --}}
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Preço</th>
							<th>Palavra-Chave</th>
							<th>Tempo</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						{{-- @php dd($products); @endphp --}}
						@foreach ($products as $product)
							<tr>
								<td>{{ $product->name }}</td>
								<td>R${{ $product->value }}</td>
								<td>{{ $product->tag }}</td>
								<td>{{ $product->prepare }}min</td>
								<td>
									<a href="#editEmployeeModal{{$product->id}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<form method="POST" action="/produtos/{{ $product->id }}">
										@csrf
										@method('DELETE')

										<button class="delete" style="color: rgb(243, 47, 47);"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
									</form>
								</td>
							</tr>
							<!-- Edit Modal HTML -->
							<div id="editEmployeeModal{{$product->id}}" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form method="POST" action="/produtos/{{ $product->id }}" enctype="multipart/form-data">
											@csrf
											<div class="modal-header">						
												<h4 class="modal-title">Edit Employee</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">					
												<div class="form-group">
													<label>Nome</label>
													<input type="text" name="name" class="form-control"  value="{{ $product->name }}" required>
												</div>
												<div class="form-group">
													<label>Valor</label>
													<input type="text" name="value" class="form-control" value="{{ $product->value }}" required>
												</div>
												<div class="form-group">
													<label>Tag</label>
													<input type="text" name="tag" class="form-control" value="{{ $product->tag }}" required>
												</div>
												<div class="form-group">
													<label>Tempo de preparo</label>
													<input type="text" name="prepare" class="form-control" value="{{ $product->prepare }}" required>
												</div>				
											</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
												<input type="submit" class="btn btn-success" value="Salvar">
											</div>
										</form>
									</div>
								</div>
							</div>
						@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> --}}
					<ul class="pagination" style="display:contents;">
						{{-- <li class="page-item disabled"><a href="#">Previous</a></li>
						<li class="page-item active"><a href="#" class="page-link">1</a></li>
						<li class="page-item"><a href="#" class="page-link">Next</a></li> --}}
						{{ $products->links() }}
					</ul>
				</div>
			</div>
		</div>        
    </div>
	<!-- ADD Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="/produtos" enctype="multipart/form-data">
					@csrf

					<div class="modal-header">						
						<h4 class="modal-title">Adicionar Produto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nome</label>
							<input type="text" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Valor</label>
							<input type="text" name="value" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tag</label>
							<input type="text" name="tag" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Tempo de preparo</label>
							<input type="text" name="prepare" class="form-control" required>
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
	
	<!-- Delete Modal HTML -->
	{{-- <div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Excluir Produto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Tem certeza de que quer excluir este produto</p>
						<p class="text-warning"><small>Essa ação não pode ser desfeita.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Deletar">
					</div>
				</form>
			</div>
		</div>
	</div> --}}
</body>
</html>
        </x-slot>
    </x-sidebar>
</x-app-layout>
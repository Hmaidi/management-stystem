
@extends('layouts.backend.app')

@section('title', 'Create Employee')

@push('css')

@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Commande</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Employee</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.order.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom de Client</label>

                                                <select name="customer_id" class="form-control">
                                                    <option value="" disabled selected>Choisir un Client</option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date de commande </label>
                                                <input type="date" class="form-control" name="order_date" value="{{ old('buying_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Type de payment</label>
                                                <select name="payment_status" class="form-control">
                                                    <option value="" disabled selected>Choisir une methode</option>

                                                    <option value="HandCash">HandCash</option>
                                                    <option value="Cheque">Cheque</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>TVA</label>
                                                <input type="text" class="form-control" name="vat" value="{{ old('vat') }}" placeholder="TVA Total">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status de payment </label>
                                                <select name="order_status" class="form-control">
                                                    <option value="" disabled selected>Choisir un status de payment</option>

                                                    <option value="pending">pending</option>
                                                    <option value="approved">approved</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Montant payeé</label>
                                                <input type="text" class="form-control" name="pay" value="{{ old('pay') }}" placeholder="pay">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Montant Restant</label>
                                                <input type="text" class="form-control" name="due" value="{{ old('due') }}" placeholder="pay">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <table class="table table-bordered" id="dynamicTable">

                                            <tr>

                                                <th>Nom de produit</th>
                                                <th>Quantité</th>
                                                <th>Prix</th>
                                                <th>TVA</th>
                                                <th>Action</th>

                                            </tr>

                                            <tr>

                                                <td>
                                                    <select name="addmore[0][name]" class="form-control">
                                                        <option value="" disabled selected>Choisir un fornisseur</option>
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td><input type="text" name="addmore[0][qty]" placeholder="Quantité" class="form-control" /></td>
                                                <td><input type="text" name="addmore[0][price]" placeholder="Prix" class="form-control" /></td>
                                                <td><input type="text" name="addmore[0][tva]" placeholder="TVA" class="form-control" /></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Ajouter</button></td>

                                            </tr>

                                        </table>

                                    </div>
                                </div>

                                <!-- /.card-body -->
                                 <input type="hidden" name="OrderId" value="{{$orders->id+1}}">
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right"> Enregistrer </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection

@push('js')
<script type="text/javascript">
    var i = 0;

    $("#add").click(function(){
        ++i;

        $("#dynamicTable").append('<tr>' +
            '<td>' +
            '<select name="addmore['+i+'][name]" class="form-control">'+
            '@foreach($products as $product)'+
            '<option value="{{ $product->id }}">{{ $product->name }}</option>'+
            '@endforeach'+
            '</select>'+
            '</td>' +
            '<td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td>' +
            '<td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td>' +
            ' <td><input type="text" name="addmore['+i+'][tva]" placeholder="TVA" class="form-control" /></td>'+
            '<td><button type="button" class="btn btn-danger remove-tr">Supprimer </button></td></tr>');

    });

    $(document).on('click', '.remove-tr', function(){

        $(this).parents('tr').remove();

    });

</script>

@endpush
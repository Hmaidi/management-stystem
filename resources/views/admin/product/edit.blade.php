@extends('layouts.backend.app')

@section('title', 'Update Product')

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"> {{ trans('global.Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">Modifier le produit</li>
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
                                <h3 class="card-title">Update Product</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>   {{ trans('products.produits.name') }}   {{ trans('products.produits.produit') }}</label>
                                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Ajouter Nom de produit">
                                            </div>
                                            <div class="form-group">
                                                <label>  {{ trans('products.produits.categorie') }} {{ trans('products.produits.produit') }}</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="" disabled selected>Choisir une catégorie</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nom de fornisseur</label>

                                                <select name="supplier_id" class="form-control">
                                                    <option value="" disabled selected>Choisir un fornisseur</option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}" {{ $product->supplier->id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>Matricule de produit</label>
                                                <input type="text" class="form-control" name="code" value="{{ $product->code }}" placeholder="Enter Product Code">
                                            </div>

                                            <div class="form-group">
                                                <label>Prix ​​de vente</label>
                                                <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}" placeholder="Prix ​​de vente">
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Date d' achat</label>
                                                <input type="date" class="form-control" name="buying_date" value="{{ $product->buying_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Date d'expiration</label>
                                                <input type="date" class="form-control" name="expire_date" value="{{ $product->expire_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Prix d'achat</label>
                                                <input type="text" class="form-control" name="buying_price" value="{{ $product->buying_price }}"  placeholder="Prix d'achat">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Image de produit</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choisir Image de produit</label>
                                                    </div>
                                                </div>
                                                <img class="mt-2" width="50" height="40" src="{{ URL::asset('storage/product/'. $product->image) }}" alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Mettre a jour</button>
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

@endpush
@extends('layouts.backend.app')

@section('title', 'Create Supplier')

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
                            <li class="breadcrumb-item active">Fornisseur</li>
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
                                <h3 class="card-title">Create Supplier</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.supplier.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Téléphone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Téléphone">
                                            </div>
                                            <div class="form-group">
                                                <label>Addresse</label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Addresse">
                                            </div>
                                            <div class="form-group">
                                                <label>Ville</label>
                                                <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Ville">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom de la societé</label>
                                                <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}" placeholder="Nom de la societé">
                                            </div>


                                            <div class="form-group">
                                                <label>
                                                    Numéro de compte</label>
                                                <input type="text" class="form-control" name="account_number" value="{{ old('account_number') }}" placeholder="Numéro de compte">
                                            </div>
                                            <div class="form-group">
                                                <label>Nom de banque</label>
                                                <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" placeholder="Nom de banque">
                                            </div>
                                            <div class="form-group">
                                                <label>Agence bancaire</label>
                                                <input type="text" class="form-control" name="bank_branch" value="{{ old('bank_branch') }}" placeholder="Agence bancaire">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choisir une photo</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Create Fornisseur</button>
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
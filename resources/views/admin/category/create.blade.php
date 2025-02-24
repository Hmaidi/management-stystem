@extends('layouts.backend.app')

@section('title', 'Create Category')

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
                            <li class="breadcrumb-item active">{{ trans('categorie.category.Create') }} {{ trans('categorie.category.Category') }}</li>
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
                                <h3 class="card-title">{{ trans('categorie.category.Create') }} {{ trans('categorie.category.Category') }}</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('admin.category.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> {{ trans('categorie.category.Name') }} {{ trans('categorie.category.Category') }}</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="créer une catégorie">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> {{ trans('categorie.category.Create') }} {{ trans('categorie.category.depot')  }}</label>
                                                <input type="text" class="form-control" name="garage" value="{{ old('garage') }}" placeholder="Ajouter un dépot">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">{{ trans('categorie.category.Create') }} {{ trans('categorie.category.Category') }}</button>
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
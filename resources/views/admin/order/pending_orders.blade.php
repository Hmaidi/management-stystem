@extends('layouts.backend.app')

@section('title', 'Pending Oprders')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pending Oprders</li>
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

                        <div class="card">
                            <div class="card-header">

                                <h3 class="card-title">PENDING ORDERS LISTS</h3>
                                <a href="{{ route('admin.order.create') }}" class="btn btn-success float-right">
                                    <i class="fa fa-credit-card"></i>
                                    Creer commande
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped text-center table-responsive-xl">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($pendings as $key => $order)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $order->customer->name ?? ''}}</td>
                                            <td>{{ $order->created_at->toFormattedDateString() ?? ''}}</td>
                                            <td>{{ $order->total_products ?? '' }}</td>
                                            <td>{{ $order->total ?? ''}}</td>
                                            <td>{{ $order->payment_status ?? '' }}</td>
                                            <td><span class="badge badge-warning">{{ $order->order_status ?? '' }}</span></td>

                                            <td>
                                                <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-success">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <button class="btn btn-danger" type="button" onclick="deleteItem({{ $order->id }})">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                                <form id="delete-form-{{ $order->id }}" action="{{ route('admin.order.destroy', $order->id) }}" method="post"
                                                      style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div> <!-- Content Wrapper end -->
@endsection




@push('js')

    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/backend/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('assets/backend/js/sweetalert2.all.min.js') }}"></script>
    <!-- Sweet Alert Js -->



    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>


<script type="text/javascript">
    function deleteItem(id) {
        const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
        })

        swalWithBootstrapButtons({
            title: '{{ trans('global.Areyousure')  }}',
            text: "{{ trans('global.NotreturntoThis')  }}",
            type: '{{ trans('global.Attention')  }}',
            showCancelButton: true,
            confirmButtonText: '{{ trans('global.deleteThis')  }}',
            cancelButtonText: '{{ trans('global.NoCancal')  }}',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
            // Read more about handling dismissals
        result.dismiss === swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons(
                '{{ trans('global.Cancelled')  }}',
                '{{ trans('global.Yourdataissafe')  }}',
                '{{ trans('global.errour')  }}'
            )
        }
    })
    }
</script>



@endpush
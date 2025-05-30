@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb-modal title="Order List" sub-title="Manage Your Order" />

            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <x-filter />

                    <!-- /Filter -->
                    <div class="table-responsive" id="dataTable">
                        <x-orders.table :orders="$orders" />
                    </div>
                </div>
            </div>
            <!-- /order list -->
        </div>
    </div>


@endsection

@push('scripts')
    <script>
    </script>
@endpush

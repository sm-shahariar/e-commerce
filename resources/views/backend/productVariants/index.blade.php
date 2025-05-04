@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb-modal title="Product Variant List" sub-title="Manage Your Product Variants" button="Add Variant" modal-id="add-variant" />

            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <x-filter />

                    <!-- /Filter -->
                    <div class="table-responsive" id="dataTable">
                        <x-productVariants.table :productVariants="$productVariants" :products="$products" />
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
  
@endsection

@push('scripts')
    <script>
        
    </script>
@endpush

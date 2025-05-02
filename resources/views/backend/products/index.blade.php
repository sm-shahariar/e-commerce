@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Product List" sub-title="Manage Your Products" permission="product-create" button="Add Product"
                button-route="admin.products.create" />

            <!-- /Filter -->
            <div class="card table-list-card">
                <x-filter />
                    
                <div class="card-body">

                    <!-- /product list -->
                    <div class="table-responsive product-list" id="dataTable">
                        <x-products.table :products="$products" :categories="$categories" :subCategories="$subCategories" />
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

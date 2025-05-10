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
                        <x-orders.table :orders="$orders" :orderItems="$orderItems" :customers="$customers" :products="$products" />
                    </div>
                </div>
            </div>
            <!-- /order list -->
        </div>
    </div>

   
@endsection

@push('scripts')
    <script>
       

        //     $('.status-checkbox').on('change', function(e) {
        //         var checkbox = $(this);
        //         var form = checkbox.closest('form');
        //         var statusLabel = form.find('.status-label');
        //         var isChecked = checkbox.is(':checked');
        //         var newStatus = isChecked ? '1' : '0';

        //         // Update the hidden input value BEFORE serializing
        //         form.find('input[name="status"]').val(newStatus);

        //         if (statusLabel.length) {
        //             statusLabel.text(newStatus === '1' ? 'Active' : 'Inactive');
        //             console.log('Status label updated to: ' + statusLabel.text());
        //         }

        //         $.ajax({
        //             url: form.attr('action'),
        //             method: form.attr('method'),
        //             data: form.serialize(),
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         }).done(function(response) {
        //             if (response.type == 'success') {
        //                 checkbox.prop('checked');
        //                 toastr.success(response.message);
        //             } else {
        //                 toastr.error(response.message);
        //                 // Revert checkbox if failed
        //                 checkbox.prop('checked', !isChecked);
        //                 // Also revert the hidden input value
        //                 form.find('input[name="status"]').val(checkbox.is(':checked') ? '1' : '0');
        //             }
        //         }).fail(function(xhr) {
        //             toastr.error("Something went wrong. Please try again.");
        //             // Revert checkbox on failure
        //             checkbox.prop('checked', !isChecked);
        //             // Also revert the hidden input value
        //             form.find('input[name="status"]').val(checkbox.is(':checked') ? '1' : '0');
        //         });
        //     });
        // });
    </script>
@endpush

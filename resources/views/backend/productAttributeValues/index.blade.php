@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb-modal title="Attribute Values List" sub-title="Manage Your Attribute Values" button="Add Attribute Value" modal-id="add-attributeValue" />

            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <x-filter />

                    <!-- /Filter -->
                    <div class="table-responsive" id="dataTable">
                        <x-productAttributeValues.table :productAttributeValues="$productAttributeValues" :productAttributes="$productAttributes"/>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>

    <!-- Add category -->
    <div class="modal fade" id="add-attributeValue">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header justify-content-between">
                            <div class="page-title">
                                <h4>Create Attribute Value</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#storeForm')[0].reset()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body new-employee-field">
                            <form action="{{ route('admin.attribute-values.store') }}" method="POST"
                                id="storeForm">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Attributes*</label>
                                    <select name="product_attribute_id" id="product_attribute_id" class="select">
                                        <option value="">Select Attribute</option>
                                        @foreach ($productAttributes as $productAttribute)
                                            <option value="{{ $productAttribute->id }}">{{ $productAttribute->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Attribute Value*</label>
                                    <div class="input-group">
                                        <input type="text" id="value_input" name="value[]" class="form-control">
                                        <button type="button" id="add_value" class="btn btn-primary">Add</button>
                                    </div>
                                    <div id="values_container" class="mt-2">
                                        <!-- New input fields will be appended here -->
                                    </div>
                                </div>
                                <div class="modal-footer-btn">
                                    <button type="button" class="btn btn-cancel me-2"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit" id="submit_btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // ajax call for store
        $(document).ready(function() {
            $('#storeForm').submit(function(e) {
                e.preventDefault();
                let SubmitBtn = $('#submit_btn');
                SubmitBtn.prop('disabled', true);
                let formData = new FormData(this);
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                }).done(function(response) {
                    if (response.type == 'success') {
                        $('#add-attributeValue').modal('hide');
                        toastr.success(response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        toastr.error(response.message);
                    }
                }).fail(function(xhr) {
                    SubmitBtn.prop('disabled', false);
                    $('#submit_btn').attr('disabled', false);
                    let response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            $('.editForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,

                }).done(function(response) {
                    if (response.type == 'success') {
                        toastr.success(response.message);
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        SubmitBtn.prop('disabled', false);
                        toastr.error(response.message);
                    }
                }).fail(function(xhr) {
                    $('#submit_btn').attr('disabled', false);
                    let response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            toastr.error(value);
                        });
                    }
                });
            });

            let values = [];

            $('#add_value').click(function () {
               // Get current value from input if not yet added
                const currentValue = $('#value_input').val().trim();
                if (currentValue !== '' && !values.includes(currentValue)) {
                    values.push(currentValue);
                    const newInput = $(`
                        <div class="d-flex align-items-center mt-2 value-row">
                            <input type="text" name="value[]" class="form-control me-2" readonly value="${currentValue}">
                            <button type="button" class="btn btn-danger btn-sm remove-value">&times;</button>
                        </div>
                    `);
                    $('#values_container').append(newInput);
                    $('#value_input').val('');
                }

                // Now prepare form data
                const formData = new FormData(this);

            });


            $('#values_container').on('click', '.remove-value', function () {
                const value = $(this).siblings('input').val();
                values = values.filter(v => v !== value);
                $(this).closest('.value-row').remove();
            });

    
        });
    </script>
@endpush

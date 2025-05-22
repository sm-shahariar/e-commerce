@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb-modal title="Attributes List" sub-title="Manage Your Attributes" button="Add Attribute" modal-id="add-attribute" />

            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <x-filter />
                    <!-- /Filter -->
                    <div class="table-responsive" id="dataTable">
                        <x-attributes.table :attributeList="$attribute_list"/>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>

    <!-- Add category -->
    <div class="modal fade" id="add-attribute">
        <div class="modal-dialog modal-dialog-centered custom-modal-two">
            <div class="modal-content">
                <div class="page-wrapper-new p-0">
                    <div class="content">
                        <div class="modal-header border-0 custom-modal-header justify-content-between">
                            <div class="page-title">
                                <h4>Create Attribute</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="$('#storeForm')[0].reset()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body custom-modal-body new-employee-field">
                            <form action="{{ route('admin.attributes.store') }}" method="POST"
                                id="storeForm">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Attribute Name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Attribute">
                                </div>
                                <div class="mb-3">
                                    <label for="from-label">Attribute Value</label>
                                    <input type="hidden" name="attribute_id" value="1">
                                    <input type="text" name="attribute_values[]" class="form-control" placeholder="Attribute Value">
                                </div>

                                <div id="attributeValue"></div>

                                <div class="mb-3">
                                    <button type="button" class="btn-secondary mt-2 text-white rounded" id="addValue">Add Value</button>
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

            $('#addValue').click(function () {
                let data = `
                    <div class="value-wrapper row mb-2">
                        <div class="col-10">
                            <input type="hidden" name="attribute_id" value="1">
                            <input type="text" name="attribute_values[]" class="form-control" placeholder="Attribute Value">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-danger remove w-100">Remove</button>
                        </div>
                    </div>
                `;
                $('#attributeValue').append(data);
            });

            $(document).on('click', '.remove', function () {
                $(this).closest('.value-wrapper').remove();
            });



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
                        $('#add-attribute').modal('hide');
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
        });
    </script>
@endpush

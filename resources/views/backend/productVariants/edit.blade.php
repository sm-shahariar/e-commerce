@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <x-breadcrumb title="Create Product Variant" button="Back to Product Variants"
                back-button-route="admin.product-variants.create" />

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Variant Information</h4>
                </div>
                <div class="card-body">
                    <form id="productVariantForm" action="{{ route('admin.product-variants.update', $variant->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Product Selector -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="add-newplus mb-2">
                                    <label for="productSelect">Select Product <span class="text-danger">*</span></label>
                                    <a href="javascript:void(0);" data-bs-toggle="modal" class="float-end"
                                        data-bs-target="#add-product">
                                        <i data-feather="plus-circle" class="plus-down-add"></i>
                                        <span>Add New</span>
                                    </a>
                                </div>

                                <select name="product_id" id="productSelect" class="form-control select2" required>
                                    <option></option>
                                    @foreach ($products as $product)
                                        <option @if ($variant->product_id == $product->id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Price and Quantity -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Price (৳) <span class="text-danger">*</span></label>
                                    <input value="{{ $variant->price }}" type="number" name="price" class="form-control" min="0" value="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Quantity <span class="text-danger">*</span></label>
                                    <input value="{{ $variant->qty }}" type="number" name="qty" class="form-control" min="0" value="0">
                                </div>
                            </div>
                        </div>

                        <!-- SKU -->
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label>SKU <span class="text-danger">*</span></label>
                                <input value="{{ $variant->sku }}" type="text" name="sku" class="form-control">
                            </div>
                        </div>

                        <!-- Attributes Section -->
                        <div class="mt-4 mb-4">
                            <h4>Product Attribute Information</h4>
                            <div id="attributeContainer">


                                @foreach ($variantAttributes as $variantAttr)



                                {{-- @dd($variantAttr->values->pluck('id')->contains('24')) --}}
                                    <div class="attribute-group row mb-3">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Attribute Name <span class="text-danger">*</span></label>
                                                <select data-attribute="{{ $loop->index }}" name="attributes[{{ $loop->index }}][attribute_id]"
                                                    class="form-control select2 attribute" required>
                                                    <option></option>
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}" @if($variantAttr ->attribute_id == $attribute->id) selected @endif>
                                                            {{ $attribute->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">

                                                <label>Attribute Values <span class="text-danger">*</span></label>
                                                <select data-attribute-value="{{ $loop->index }}" name="attributes[{{ $loop->index }}][attribute_value_id][]"
                                                    class="form-control select2 attribute-values" required>

                                                    @foreach ($variantAttr->attribute->values as $attrValue)
                                                        <option value="{{ $attrValue->id }}" @if($variantAttr->values->pluck('attribute_value_id')->contains($attrValue->id)) selected @endif>
                                                             {{ $attrValue->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button"
                                                class="btn btn-danger remove-attribute d-none">Remove</button>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                            <button type="button" id="addAttribute" class="btn btn-secondary mt-2">Add Another
                                Attribute</button>
                        </div>

                        <!-- Submit -->
                        <div class="text-end">
                            <button type="submit" id="submit_btn" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select an option',
                allowClear: true
            });

            let index = {{ count($variantAttributes) - 1 }};

            $('#addAttribute').click(function() {
                index++;
                const newGroup = `
            <div class="attribute-group row mb-3">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Attribute Name <span class="text-danger">*</span></label>
                        <select data-attribute="${index}" name="attributes[${index}][attribute_id]" class="form-control select2 attribute" required>
                            <option></option>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Attribute Values <span class="text-danger">*</span></label>
                        <select data-attribute-value="${index}" name="attributes[${index}][attribute_value_id][]" class="form-control select2 attribute-values" required>
                        </select>
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-attribute">Remove</button>
                </div>
            </div>
        `;
                $('#attributeContainer').append(newGroup);
                $('.select2').select2({
                    placeholder: 'Select an option',
                    allowClear: true
                });
            });

            $(document).on('click', '.remove-attribute', function() {
                $(this).closest('.attribute-group').remove();
            });

            // Submit form via AJAX
            $('#productVariantForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let submitBtn = $('#submit_btn').prop('disabled', true);

                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                }).done(function(response) {
                    if (response.type === 'success') {
                        toastr.success(response.message);
                        window.location.href = response.redirect;
                    } else {
                        toastr.error(response.message);
                        submitBtn.prop('disabled', false);
                    }
                }).fail(function(xhr) {
                    submitBtn.prop('disabled', false);
                    let response = xhr.responseJSON;
                    if (response && response.errors) {
                        $.each(response.errors, function(key, value) {
                            toastr.error(value);
                        });
                    } else {
                        toastr.error(response.message || 'Something went wrong.');
                    }
                });
            });

            //on attribute change
            $(document).on('change', '.attribute', function() {

                const attributeIndex = $(this).data('attribute');
                const attributeId = $(this).val();


                if (!attributeId) return;

                $.ajax({
                    url: '{{ url('admin/product-variants/values') }}' + '/' + attributeId,
                    type: 'GET',
                    success: function(response) {

                        const valueSelect = $(
                            `select[data-attribute-value="${attributeIndex}"]`);

                        // Clear existing options
                        valueSelect.empty();

                        // Add new options from response
                        $.each(response, function(i, value) {
                            valueSelect.append(
                                `<option value="${value.id}">${value.name}</option>`
                                );
                        });

                        // Refresh Select2
                        valueSelect.trigger('change');
                    },
                    error: function(xhr) {
                        toastr.error('Failed to load attribute values');
                    }
                });
            });
        });
    </script>
@endpush

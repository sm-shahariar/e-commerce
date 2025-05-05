@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <x-breadcrumb title="Edit Variant" button="Back" back-button-route="admin.product-variants.index" />

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Product Variant</h4>
            </div>
            <div class="card-body">
                <form id="productVariantForm" action="{{ route('admin.product-variants.update', $productVariant->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Product Selector -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <label for="productSelect">Select Product <span class="text-danger">*</span></label>
                            <select name="product_id" id="productSelect" class="form-control select2" required>
                                <option></option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $productVariant->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Price and Quantity -->
                    <div class="row">
                        <div class="col-md-6">
                            <label>Price (৳) <span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control" min="0" value="{{ $productVariant->price }}">
                        </div>
                        <div class="col-md-6">
                            <label>Quantity <span class="text-danger">*</span></label>
                            <input type="number" name="qty" class="form-control" min="0" value="{{ $productVariant->qty }}">
                        </div>
                    </div>

                    <!-- SKU -->
                    <div class="col-md-6 mt-3">
                        <label>SKU <span class="text-danger">*</span></label>
                        <input type="text" name="sku" class="form-control" value="{{ $productVariant->sku }}">
                    </div>

                    <!-- Attributes -->
                    <div class="mt-4 mb-4">
                        <h4>Product Attribute Information</h4>
                        <div id="attributeContainer">
                            @php $index = 0; @endphp
                            @foreach ($variantAttributes as $attributeId => $values)
                                <div class="attribute-group row mb-3">
                                    <div class="col-md-5">
                                        <label>Attribute Name <span class="text-danger">*</span></label>
                                        <select name="attributes[{{ $index }}][attribute_id]" class="form-control select2" required>
                                            <option></option>
                                            @foreach ($attributes as $attribute)
                                                <option value="{{ $attribute->id }}" {{ $attribute->id == $attributeId ? 'selected' : '' }}>
                                                    {{ $attribute->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Attribute Values <span class="text-danger">*</span></label>
                                        <select name="attributes[{{ $index }}][attribute_value_id][]" class="form-control select2" multiple required>
                                            <option></option>
                                            @foreach ($attributeValues as $value)
                                                <option value="{{ $value->id }}"
                                                    {{ in_array($value->id, $values->pluck('product_attribute_value_id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $value->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger remove-attribute {{ $loop->first ? 'd-none' : '' }}">Remove</button>
                                    </div>
                                </div>
                                @php $index++; @endphp
                            @endforeach
                        </div>
                        <button type="button" id="addAttribute" class="btn btn-secondary mt-2">Add Another Attribute</button>
                    </div>

                    <!-- Submit -->
                    <div class="text-end">
                        <button type="submit" id="submit_btn" class="btn btn-primary">Update</button>
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
        $('.select2').select2({ placeholder: 'Select an option', allowClear: true });

        let index = {{ $index ?? 1 }};

        $('#addAttribute').click(function() {
            const newGroup = `
                <div class="attribute-group row mb-3">
                    <div class="col-md-5">
                        <label>Attribute Name <span class="text-danger">*</span></label>
                        <select name="attributes[${index}][attribute_id]" class="form-control select2" required>
                            <option></option>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label>Attribute Values <span class="text-danger">*</span></label>
                        <select name="attributes[${index}][attribute_value_id][]" class="form-control select2" multiple required>
                            <option></option>
                            @foreach ($attributeValues as $value)
                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-attribute">Remove</button>
                    </div>
                </div>
            `;
            $('#attributeContainer').append(newGroup);
            $('.select2').select2({ placeholder: 'Select an option', allowClear: true });
            index++;
        });

        $(document).on('click', '.remove-attribute', function() {
            $(this).closest('.attribute-group').remove();
        });

        // AJAX Submit
        $('#productVariantForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $('#submit_btn').prop('disabled', true);

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
            }).done(function(response) {
                toastr.success(response.message);
                window.location.href = response.redirect;
            }).fail(function(xhr) {
                $('#submit_btn').prop('disabled', false);
                let response = xhr.responseJSON;
                if (response.errors) {
                    $.each(response.errors, function(key, value) {
                        toastr.error(value);
                    });
                } else {
                    toastr.error(response.message || 'Something went wrong.');
                }
            });
        });
    });
</script>
@endpush

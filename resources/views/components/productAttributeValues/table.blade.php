<table class="table">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Attribute</th>
            <th>Attribute Value</th>
            <th>Created On</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody id="tbody">
        @forelse ($productAttributeValues as $productAttributeValue)
            <tr>
                <td>
                    {{ $loop->iteration + $productAttributeValues->firstItem() - 1 }}
                </td>
                <td>{{ $productAttributeValue->productAttribute->name }}</td>
                <td>
                    <div class="d-flex flex-wrap gap-2" style="max-height: 50px; overflow-y: auto;">
                        <span class="badge bg-light text-dark d-flex align-items-center">
                            <span class="me-2" style="width: 8px; height: 8px; background: red; border-radius: 50%;"></span>
                            {{ $productAttributeValue->value }}
                        </span>
                    </div>
                </td>
                <td>{{ $productAttributeValue->created_at->format('d M Y') }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit-productAttributeValue-{{ $productAttributeValue->id }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.attribute-values.destroy', $productAttributeValue->id) }}"
                              method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <a class="confirm-text2 p-2" href="javascript:void(0);">
                                <i data-feather="trash-2" class="feather-trash-2"></i>
                            </a>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="edit-productAttributeValue-{{ $productAttributeValue->id }}">
                <div class="modal-dialog modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header justify-content-between">
                                    <div class="page-title">
                                        <h4>Edit Attribute Value</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body new-employee-field">
                                    <form class="editForm" data-id="{{ $productAttributeValue->id }}"
                                        action="{{ route('admin.attribute-values.update', $productAttributeValue->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label">Attributes*</label>
                                            <select name="product_attribute_id" class="form-control select">
                                                <option value="">Select Attribute</option>
                                                @foreach ($productAttributes as $productAttribute)
                                                    <option value="{{ $productAttribute->id }}"
                                                        {{ $productAttribute->id == $productAttributeValue->product_attribute_id ? 'selected' : '' }}>
                                                        {{ $productAttribute->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Attribute Value*</label>
                                            <div class="input-group mb-2">
                                                <input type="text" name="value[]" class="form-control" value="{{ $productAttributeValue->value }}">
                                                <button type="button" class="btn btn-primary" onclick="addEditValueField({{ $productAttributeValue->id }})">Add</button>
                                            </div>
                                            <div id="edit-values-container-{{ $productAttributeValue->id }}">
                                                <!-- Additional value fields can be added here -->
                                            </div>
                                        </div>

                                        <div class="modal-footer-btn">
                                            <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Edit Modal -->
        @empty
            <tr class="text-center">
                <td colspan="7">No Attribute Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

<x-pagination :paginator="$productAttributeValues" />

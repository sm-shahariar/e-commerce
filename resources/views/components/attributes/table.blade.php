<table class="table">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Attribute</th>
            <th>Created On</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>

    
    <tbody id="tbody">
        @forelse ($attributeList as $attribute)
            <tr>
                <td>
                    {{ $loop->iteration + $attributeList->firstItem() - 1 }}
                </td>
                <td>

                <div>{{ $attribute->name }}</div>
                <div>
                @foreach ($attribute->values as $value)
                        <span class="badge badge-pill badge-primary">{{ $value->name }}</span>
                @endforeach
                </div>

                </td>
                <td>{{ $attribute->created_at->format('d M Y') }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit-Attribute-{{ $attribute->id }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.attributes.destroy', $attribute->id) }}"
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

            <!-- Edit attribute -->
            <div class="modal fade" id="edit-Attribute-{{ $attribute->id }}">
                <div class="modal-dialog modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header justify-content-between">
                                    <div class="page-title">
                                        <h4>Edit Attribute</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body new-employee-field">
                                    <form class="editForm" data-id="{{ $attribute->id }}"
                                        action="{{ route('admin.attributes.update', $attribute->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Attribute Name*</label>
                                            <input type="text" class="form-control"
                                                value="{{ $attribute->name }}" name="name">
                                        </div>
                                        <div class="modal-footer-btn">
                                            <button type="button" class="btn btn-cancel me-2"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-submit">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit category -->
        @empty
            <tr class="text-center">
                <td colspan="7">No Attribute Found</td>
            </tr>
        @endforelse

    </tbody>
</table>
<x-pagination :paginator="$attributeList" />
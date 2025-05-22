<table class="table">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Name</th>
            <th>Created On</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody id="tbody">
        @forelse ($attributeValueList as $AttributeValue)
            <tr>
                <td>
                    {{ $loop->iteration + $attributeValueList->firstItem() - 1 }}
                </td>
                <td>
                    <div class="d-flex flex-wrap gap-2 ">
                        <span class="badge bg-light text-dark d-flex align-items-center font-bold">
                            <span class="me-2" style="width: 8px; height: 8px; background: red; border-radius: 50%; "></span>
                            <span style="font-size: 15px !important;">{{ $AttributeValue->name }}</span>
                        </span>
                    </div>
                </td>
                <td>{{ $AttributeValue->created_at->format('d M Y') }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit-AttributeValue-{{ $AttributeValue->id }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.attribute-values.destroy', $AttributeValue->id) }}"
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
            <div class="modal fade" id="edit-AttributeValue-{{ $AttributeValue->id }}">
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
                                    <form class="editForm" data-id="{{ $AttributeValue->id }}"
                                        action="{{ route('admin.attribute-values.update', $AttributeValue->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label">Name*</label>
                                            <input type="text" id="value_input" name="name" value="{{ $AttributeValue->name }}" class="form-control">
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

<x-pagination :paginator="$attributeValueList" />

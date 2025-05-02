<table class="table">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Sub Category</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Status</th>
            <th>Created On</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody id="tbody">
        @forelse ($subCategories as $subCategory)
            <tr>
                <td>
                    {{ $loop->iteration + $subCategories->firstItem() - 1 }}
                </td>
                <td>{{ $subCategory->name }}</td>
                <td>{{ $subCategory->slug }}</td>
                <td>{{ $subCategory->category->name }}</td>
                <td>
                    <form class="status-form" action="{{ route('admin.sub-categories.status', $subCategory->id) }}" method="POST" data-id="{{ $subCategory->id }}">
                        @csrf
                        @method('PATCH')
                        <label class="toggle-switch">
                            <input type="checkbox" class="status-checkbox" {{ $subCategory->status == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        
                        <input type="hidden" name="status" value="{{ $subCategory->status }}">
                    </form>

                </td>
                <td>{{ $subCategory->created_at->format('d M Y') }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit-subCategory-{{ $subCategory->id }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.sub-categories.destroy', $subCategory->id) }}"
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

            <!-- Edit Sub category -->
            <div class="modal fade" id="edit-subCategory-{{ $subCategory->id }}">
                <div class="modal-dialog modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header justify-content-between">
                                    <div class="page-title">
                                        <h4>Edit Sub Category</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body new-employee-field">
                                    <form class="editForm" data-id="{{ $subCategory->id }}"
                                        action="{{ route('admin.sub-categories.update', $subCategory->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Name*</label>
                                            <input type="text" class="form-control"
                                                value="{{ $subCategory->name }}" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Slug*</label>
                                            <input type="text" class="form-control"
                                                value="{{ $subCategory->slug }}" name="slug">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Category*</label>
                                            <select class="select" name="category_id">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="
                                                    {{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
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
            <!-- Edit Sub category -->
        @empty
            <tr class="text-center">
                <td colspan="7">No Sub Category Found</td>
            </tr>
        @endforelse

    </tbody>
</table>
<x-pagination :paginator="$subCategories" />
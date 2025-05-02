<table class="table">
    <thead>
        <tr>
            <th class="no-sort">SL</th>
            <th>Category</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Created On</th>
            <th class="no-sort">Action</th>
        </tr>
    </thead>
    <tbody id="tbody">
        @forelse ($categories as $category)
            <tr>
                <td>
                    {{ $loop->iteration + $categories->firstItem() - 1 }}
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <form class="status-form" action="{{ route('admin.categories.status', $category->id) }}" method="POST" data-id="{{ $category->id }}">
                        @csrf
                        @method('PATCH')
                        <label class="toggle-switch">
                            <input type="checkbox" class="status-checkbox" {{ $category->status == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                        
                        <input type="hidden" name="status" value="{{ $category->status }}">
                    </form>

                </td>
                <td>{{ $category->created_at->format('d M Y') }}</td>
                <td class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#edit-category-{{ $category->id }}">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
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

            <!-- Edit category -->
            <div class="modal fade" id="edit-category-{{ $category->id }}">
                <div class="modal-dialog modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header justify-content-between">
                                    <div class="page-title">
                                        <h4>Edit Category</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body new-employee-field">
                                    <form class="editForm" data-id="{{ $category->id }}"
                                        action="{{ route('admin.categories.update', $category->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label">Category*</label>
                                            <input type="text" class="form-control"
                                                value="{{ $category->name }}" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Slug*</label>
                                            <input type="text" class="form-control"
                                                value="{{ $category->slug }}" name="slug">
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
                <td colspan="7">No Category Found</td>
            </tr>
        @endforelse

    </tbody>
</table>
<x-pagination :paginator="$categories" />
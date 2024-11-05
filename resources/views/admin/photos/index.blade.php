@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @include('layouts.partials.alert')
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between">
                <h5 class="card-header">Photos</h5>
                <!-- Search -->
                <div class="nav-item d-flex align-items-center desktop-search-view">
                    <i class="ri-search-line ri-22px me-2"></i>
                    <form action="{{ route('admin.photos.index') }}" method="GET">
                        <input type="search" name="search" value="{{ $search }}"
                            class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                        <button type="submit" class="d-none">Submit</button>
                    </form>
                </div>
                <!-- /Search -->
                <h5 class="card-header">
                    <a href="#" class="btn btn-primary">
                        <span class="tf-icons ri-add-circle-line ri-16px me-1_5"></span>Add Photo
                    </a>
                </h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Status</th>
                            <th>Upload Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($photos) > 0)
                            @foreach ($photos as $index => $photo)
                                <tr>
                                    <td>{{ $index + $photos->firstItem() }}</td>

                                    <td><img src="{{ $photo->image ? asset('admin-assets/img/avatars/' . $photo->image) : asset('admin-assets/img/avatars/1.png') }}"
                                            alt="{{ $photo->name }}" class="w-px-40 h-auto rounded-circle"
                                            style="margin-right: 5px" />
                                        <span>{{ $photo->name }}</span>
                                    </td>
                                    <td>{{ $photo->tag }}</td>
                                    <td>
                                        @if ($photo->status == 'active')
                                            <span class="badge rounded-pill bg-label-success me-1">Active</span>
                                        @elseif ($photo->status == 'inactive')
                                            <span class="badge rounded-pill bg-label-primary me-1">Inactive</span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger me-1">Rejected</span>
                                        @endif
                                    </td>
                                    <td>{{ $photo->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#"><i class="ri-pencil-line me-1"></i>
                                                    Edit</a>
                                                <form action="#" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $photo->id }}">
                                                    <button type="submit" class="dropdown-item"
                                                        onclick="return confirm('Are you sure delete this photo ?')"><i
                                                            class="ri-delete-bin-6-line me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Photo List Empty...</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="mt-5">
                    {{ $photos->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
        <!-- End Basic Bootstrap Table -->
    </div>
@endsection

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
                        <input type="text" name="search" value="{{ $search }}"
                            class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                        <button type="submit" class="d-none">Submit</button>
                    </form>
                    @if ($search)
                        <a href="{{ route('admin.photos.index') }}"><i class="ri-delete-back-2-line"></i></a>
                    @endif
                </div>
                <!-- /Search -->
                <h5 class="card-header">
                    <a href="{{ route('admin.photo.add') }}" class="btn btn-primary">
                        <span class="tf-icons ri-add-circle-line ri-16px me-1_5"></span>Upload Photo
                    </a>
                </h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th>Title</th>
                            <th>Tag</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($photos) > 0)
                            @foreach ($photos as $index => $photo)
                                <tr>
                                    <td>{{ $index + $photos->firstItem() }}</td>

                                    <td><img src="{{ $photo->image ? asset('admin-assets/img/photos/' . $photo->image) : asset('admin-assets/img/avatars/1.png') }}"
                                            alt="{{ $photo->name }}" class="w-px-50 h-auto" style="margin-right: 5px"
                                            data-bs-toggle="modal" data-bs-target="#{{ $photo->id }}" />
                                        <span>{{ $photo->name }}</span>
                                    </td>
                                    <td>{{ $photo->tag }}</td>
                                    <td>
                                        @if ($photo->status == 'active')
                                            <span class="badge rounded-pill bg-label-success me-1">Approved</span>
                                        @elseif ($photo->status == 'new')
                                            <span class="badge rounded-pill bg-label-primary me-1">New</span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger me-1">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($photo->featured == 1)
                                            <span class="badge rounded-pill bg-label-success me-1"><i
                                                    class="ri-star-fill"></i></span>
                                        @else
                                            <span class="badge rounded-pill bg-label-danger me-1"><i
                                                    class="ri-star-line"></i></span>
                                        @endif
                                    </td>
                                    <td>{{ date('d M Y', strtotime($photo->created_at)) }}</td>
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

                                    <!-- Extra Large Modal -->
                                    <div class="modal fade" id="{{ $photo->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel4">
                                                        {{ $photo->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-0">
                                                        <div class="col-md-8">
                                                            <img class="card-img rounded"
                                                                src="{{ asset('admin-assets/img/photos/' . $photo->image) }}"
                                                                alt="{{ $photo->name }}" />
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card-body">
                                                                <p><strong>Title: </strong>{{ $photo->name }}</p>
                                                                <p><strong>Tag: </strong>{{ $photo->tag }}</p>
                                                                <p><strong>Date: </strong>{{ date('d M Y', strtotime($photo->created_at)) }}</p>
                                                                <p><strong>Title: </strong>{{ $photo->name }}</p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Approve</button>
                                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Reject</button>
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

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
                <table id="image-table" class="table">
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
                                            alt="{{ $photo->name }}" class="w-px-50 h-auto image-preview"
                                            style="margin-right: 5px" 
                                            data-id="{{ $photo->id }}" 
                                            data-filename="{{ $photo->name }}"
                                            data-tag="{{ $photo->tag }}"
                                            data-uploadon="{{ date('d M Y', strtotime($photo->created_at)) }}"
                                            data-uploadby="{{ $photo->user->name }}"
                                            data-status="{{ ucfirst($photo->status) }}
                                                @if ($photo->status == 'new') (Need approval) @endif" />
                                        <span>{{ $photo->name }}</span>
                                    </td>
                                    <td>{{ $photo->tag }}</td>
                                    <td>
                                        @if ($photo->status == 'approved')
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
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Photo List Empty...</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Start Photo Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="modal-header" class="modal-title" id="exampleModalLabel4"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <img id="modalImage" class="card-img rounded" src=""/>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <p id="title"></p>
                                            <p id="tag"></p>
                                            <p id="uploadon"></p>
                                            <p id="uploadby"></p>
                                            <p id="filename2"></p>
                                            <p id="filesize"></p>
                                            <p id="dimensions"></p>
                                            <p id="status"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="approve-loader" class="btn btn-outline-success"
                                    data-bs-dismiss="modal" data-id="">Approve</button>
                                <button type="button" id="reject-loader" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal" data-id="">Reject</button>
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Photo Modal -->

                <div class="mt-5">
                    {{ $photos->withQueryString()->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
        <!-- End Basic Bootstrap Table -->
    </div>
@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {
            // Modal image show and details show
            $('#image-table').on('click', '.image-preview', function() {
                const id = $(this).data('id');
                const imageUrl = $(this).attr('src');
                const filename = $(this).data('filename');
                const filename2 = imageUrl.split('/').pop();
                const tag = $(this).data('tag');
                const uploadon = $(this).data('uploadon');
                const uploadby = $(this).data('uploadby');
                const status = $(this).data('status');

                // Set image source and filename in modal
                $('#approve-loader').attr('data-id', id);
                $('#reject-loader').attr('data-id', id);
                $('#modalImage').attr('src', imageUrl);
                $('#filename').text('Filename: ' + filename);
                $('#modal-header').text(filename);
                $("#title").html("<strong>Title: </strong>" + filename);
                $("#tag").html("<strong>Tag: </strong>" + tag);
                $("#uploadon").html("<strong>Uploaded on: </strong>" + uploadon);
                $("#uploadby").html("<strong>Uploaded by: </strong>" + uploadby);
                $("#filename2").html("<strong>File name: </strong>" + filename2);
                $("#status").html("<strong>Status: </strong>" + status);

                const image = new Image();
                image.src = imageUrl;
                image.onload = function() {
                    const width = image.width;
                    const height = image.height;
                    const estimatedSizeInBytes = width * height * 3;
                    const filesize = estimatedSizeInBytes;
                    const dimensions = `${image.width} x ${image.height}`;

                    $("#filesize").html("<strong>File size: </strong>" + filesize + " bytes");
                    $("#dimensions").html("<strong>Dimensions: </strong>" + dimensions);
                };

                // Show modal
                $('#imageModal').modal('show');
            });

            // Image approved and set loader then redirect route
            $('#approve-loader').click(function() {
                const id = $(this).data('id');
                var url = "{{ route('admin.photo.approved', ['id' => ':id']) }}";
                url = url.replace(':id', id);                

                $('#loader').show();

                setTimeout(function() {
                    window.location.href = url;
                }, 2000);
            });

            // Image reject and set loader then redirect route
            $('#reject-loader').click(function() {
                const id = $(this).data('id');
                var url = "{{ route('admin.photo.rejected', ['id' => ':id']) }}";
                url = url.replace(':id', id);                

                $('#loader').show();

                setTimeout(function() {
                    window.location.href = url;
                }, 2000);
            });
        });
    </script>
@endpush

<div class="modal fade" id="modal-{{ $model }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">
                    {{ $photo->name }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-0">
                    <div class="col-md-8">
                        <img id="modalPhoto" class="card-img rounded" src="" alt="{{ $photo->name }}" />
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <p><strong>Title: </strong>{{ $photo->name }}</p>
                            <p><strong>Tag: </strong>{{ $photo->tag }}</p>
                            <p><strong>Uploaded on:
                                </strong>{{ date('d M Y', strtotime($photo->created_at)) }}
                            </p>
                            <p><strong>Uploaded by: </strong>{{ $photo->user->name }}
                            </p>
                            <p id="filename"></p>
                            <p id="filesize"></p>
                            <p id="dimensions"></p>
                            <p>
                                <strong>Status: </strong>{{ ucfirst($photo->status) }}
                                @if ($photo->status == 'new')
                                    <span class="text-primary">(Need approval)</span>
                                @endif
                            </p>

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
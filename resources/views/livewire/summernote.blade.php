<div>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6 m-auto">
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Create
                    </button>
                <div class="card">
                    <div class="card-header">summrnote</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>note</th>
                            </tr>
                            @foreach ($snote as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {!! $data->note !!}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="store">
                        <div class="form-control">
                            <label for="" class="form-label">Title</label>
                            <input class="form-control" type="text" name="text" id="" wire:model="text">
                            @error('text')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div wire:ignore class="form-control">
                            <label for="" class="form-label">Note</label>
                            <textarea name="body" id="summernote" cols="30" rows="10" placeholder="Body*"></textarea>

                        </div>
                        @error('note')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @section('script')
    <script>
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#summernote').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        @this.set('note', contents);
                    }
                }
            });
        });
    </script>
@endsection
</div>



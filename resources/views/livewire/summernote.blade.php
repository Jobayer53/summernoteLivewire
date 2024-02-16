<div>

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-lg-6 m-auto">
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                        Create
                    </button>
                <div class="card">
                    <div class="card-header">summrnote</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>note</th>
                                <th>action</th>
                            </tr>
                            @foreach ($snote as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {!! $data->note !!}</td>
                                <td>
                                    <button wire:click="edit({{ $data->id }})" data-bs-toggle="modal" data-bs-target="#updateModal" type="button"  class="btn btn-info" >edit</button>
                                    <button wire:click="delete({{ $data->id }})" type="button" class="btn btn-danger" >
                                        del
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModal">Modal title</h1>
                    <button type="button" class="btn-close" wire:click="closeModal"  aria-label="Close"></button>
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
                        <div wire:ignore  class="form-control">
                            <label for="" class="form-label">Note</label>
                            <textarea name="body" id="summernote" cols="30" rows="10" placeholder="Body*" wire:model="note"></textarea>

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

    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModal">update title</h1>
                    <button type="button" class="btn-close" wire:click="closeModal"  aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="update">
                        <div class="form-control">
                            <label for="" class="form-label">Title</label>
                            <input class="form-control" type="text" name="text" id="" wire:model="text">
                            <input  type="hidden"  wire:model="snote_id">
                            @error('text')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div wire:ignore class="form-control">
                            <label for="" class="form-label">Note</label>
                            <textarea name="body" id="editsummernote" cols="30" rows="10" placeholder="Body*" wire:model="note"></textarea>

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
    {{-- <script>
        $('#createModal').on('shown.bs.modal', function () {
            $('#summernote').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        @this.set('note', contents);
                    }
                }
            });
        });
        $('#updateModal').on('shown.bs.modal', function () {
            $('#editsummernote').summernote({
                callbacks: {
                    onChange: function (contents, $editable) {
                        @this.set('note', contents);
                    }
                }
            });
        });

    </script> --}}
    <script>
        $(document).ready(function() {
            $('#createModal').on('shown.bs.modal', function () {
                $('#summernote').summernote({
                    callbacks: {
                        onChange: function (contents) {
                            @this.set('note', contents);
                        }
                    }
                });
            });
            $('#createModal').on('hidden.bs.modal', function () {
                    $('#summernote').summernote('reset');
                    $('#summernote').val('');
                });

        });
        $(document).ready(function() {
            $('#updateModal').on('shown.bs.modal', function () {
                $('#editsummernote').summernote({
                    callbacks: {
                        onChange: function (contents) {
                            @this.set('note', contents);
                        }
                    }
                });
            });

            $('#updateModal').on('hidden.bs.modal', function () {
                $('#editsummernote').summernote('reset');
                $('#editsummernote').val('');
            });
        });
    </script>


@endsection
</div>



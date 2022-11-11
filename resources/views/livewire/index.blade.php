<div>
    <div class="pagetitle">
        <h1>Indexes Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Indexes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->



    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Indexes</h5>
                        <div class="d-flex justify-content-between">

                            @if ($message = Session::get('error') ?: Session::get('success'))
                                <div class="alert alert-{{ Session::get('error') ? 'danger' : 'success' }}"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @else
                                <span></span>
                            @endif

                            <span>
                                <input type="text" class="rounded form-control" placeholder="Search"
                                    wire:model.debounce.500ms="search" />
                            </span>
                        </div>



                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Banner</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($indexes as $index)
                                    <tr>
                                        <th scope="row">{{ $index->id }}</th>
                                        <td>
                                            <img class="rounded-circle" style="height:60px; width:60px;"
                                                src="/{{ $index->banners[0] ?? asset('assets/img/avator.png') }}"
                                                alt="{{ $index->title }}" />
                                        </td>
                                        <td>{{ $index->title }}</td>
                                        <td>{{ $index->slug }}</td>
                                        <td class="small fw-bold {{ $index->status ? 'text-success' : 'text-danger' }}">
                                            <i class=" {{ $index->status ? 'bi bi-check-circle-fill' : 'bi bi-x-circle-fill' }}"
                                                style="font-size: 1.2rem"></i>
                                        </td>
                                        <td class="d-flex">
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modalDialogScrollable"
                                                wire:click="openEditUser({{ $index }})"><i
                                                    class="bi bi-pencil"></i></button>
                                            <button class="btn btn-danger ms-1 btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#basicModal"
                                                wire:click="openDeleteModal({{ $index->id }})"><i
                                                    class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                    <footer class="m-auto mb-2">{{ $indexes->links() }}</footer>
                </div>

            </div>
        </div>
    </section>


    {{-- Delete User Model --}}

    <div class="modal fade" id="basicModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Index</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this index?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        wire:click="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic Modal-->

    <!-- Modal Dialog Scrollable -->
    @if (isset($index) && !empty($index))
        <div class="modal fade" id="modalDialogScrollable" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-dialog-scrollable">
                <form action="{{ route('indexes.update', $index->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <section class="section profile">
                                <input type="hidden" name="_method" value="PUT" />
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="card">
                                            <div class="card-body pt-3">
                                                <div class="row mb-3">
                                                    @if (Session::has('success'))
                                                        <span class="text-success">{{ Session::get('success') }}</span>
                                                    @endif
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                    <label for="fullName"
                                                        class="col-md-4 col-lg-3 col-form-label">Title</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="title" type="text" class="form-control"
                                                            id="Name" wire:model.lazy="index.title" value="">
                                                    </div>
                                                </div>


                                                <div class="row mb-3">
                                                    <label for="Email"
                                                        class="col-md-4 col-lg-3 col-form-label">Status</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <select class="form-control" name="status">
                                                            @isset($index)
                                                                @if ($index->status)
                                                                    <option value="{{ $index->status }}">active</option>
                                                                    <option value="0">inactive</option>
                                                                @else
                                                                    <option value="{{ $index->status }}">inactive</option>
                                                                    <option value="1">active</option>
                                                                @endif
                                                            @endisset
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-images" name="images"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                           >Save changes</button>
                    </div>
                </div>
            </form>
            </div>
        </div><!-- End Large Modal-->
    @endif

</div>
@push('js')
    <script type="text/javascript" src="{{ asset('assets/js/image-uploader.min.js') }}"></script>
    <script>
        @error('title')
            $("#modalDialogScrollable").modal('show');
        @enderror

        window.addEventListener('openEditModal', event => {
            var banners = <?php echo json_encode($index->banners); ?>;
            console.log(banners)
            var preloaded = [];
            for (let i = 0; i < banners.length; i++) {
                preloaded.push({
                    id: i,
                    src: `/${banners[i]}`
                })
            }
            console.log(preloaded)
            $('.input-images').imageUploader({
                preloaded: preloaded,
                preloadedInputName: 'images',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 10
            });
            $("#modalDialogScrollable").modal('show');
        })

        window.addEventListener('closeEditModal', event => {
            $("#modalDialogScrollable").modal('hide');
        })

        window.addEventListener('closeDeleteModal', event => {
            $("#basicModal").modal('hide');
        })

        window.addEventListener('openDeleteModal', event => {
            $("#basicModal").modal('show');
        });
    </script>
@endpush

@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Index</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>

                        <li>{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif


            <form class="row g-3" action="{{ route('indexes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <h5 class="card-title">Payments</h5> --}}

                <div class="col-6">
                    <label for="title" class="form-label">Title (*)</label>
                    <input type="text" class="form-control" name="title" id="title"
                        value="{{ $index->title ?? '' }}" placeholder="Enter title here" minlength="3" maxlength="100"
                        required>
                </div>


                <div class="col-6">
                    <label for="description" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="1" selected>active</option>
                        <option value="0">inactive</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="input-images"></div>
                </div>

                <div class=" text-center mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                </div>
            </form>

        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/js/image-uploader.min.js') }}"></script>

    <script>
        @if (isset($index))
            const preloaded = <?php echo json_encode($index->banners); ?>;
            $('.input-images').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'images',
                preloadedInputName: 'old',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 10
            });
        @else
            $('.input-images').imageUploader();
        @endif
    </script>
@endpush

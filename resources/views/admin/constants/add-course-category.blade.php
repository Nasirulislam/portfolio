<x-app-layout>
@section('main')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add Course Category</h5>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Vertical Form -->
            <form class="row g-3" action="/course_categories" method="post">
                @csrf
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Category Title (*)</label>
                    <input type="text" minlength="3" maxlength="30" class="form-control" name="course_title" id="inputNanme4" placeholder="Enter Title Here" required>
                </div>

                {{-- <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                    {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
</x-app-layout>

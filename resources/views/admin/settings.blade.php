<x-app-layout>
    @section('main')

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Settings</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>

                            <li>{{ $errors->first() }}</li>
                        </ul>
                    </div>
                @endif


                @if (isset($message))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif


                <!-- Vertical Form -->
                <form class="row g-3" action="/settings" method="post">
                    @csrf
                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">App Name (*)</label>
                        <input type="text" minlength="3" maxlength="30" class="form-control"
                            value="{{ $settings->general->app_name ?? 'Global Fansy' }}" name="app_name" id="inputNanme4"
                            placeholder="Enter App Name Here" required>
                    </div>

                    <h5 class="card-title">Payments</h5>

                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">Min Price in € (*)</label>
                        <input type="number" class="form-control" name="course_min_price"
                            value="{{ $settings->courses->min_price ?? 1 }}" id="inputNanme4"
                            placeholder="Enter Min Price Here in Euro" min="1" max="999" required>
                    </div>


                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">Max Price in € (*)</label>
                        <input type="number" class="form-control" name="course_max_price" id="inputNanme4"
                            value="{{ $settings->courses->max_price ?? 999 }}" min="1" max="999"
                            placeholder="Enter Course Max Price Here" required>
                    </div>


                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">App Fee in % (*)</label>
                        <input type="number" value="{{ $settings->courses->app_fee ?? 20 }}" class="form-control"
                            name="course_app_fee" id="inputNanme4" min="0" max="100" placeholder="Enter App Fee in %"
                            required>
                    </div>

                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">Vat Percentage(*)</label>
                        <input type="number" value="{{ $settings->courses->vat ?? 24 }}" class="form-control"
                            name="course_vat" id="inputNanme4" min="0" max="100" placeholder="Enter Vat in %" required>
                    </div>

                    {{-- <h5 class="card-title">LiveStream</h5>

                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">LiveStream Max Price in € (*)</label>
                        <input type="number" class="form-control" value="{{ $settings->livestreams->max_price ?? 999 }}"
                            name="livestream_max_price" id="inputNanme4" placeholder="Enter LiveStream Max Price  Here"
                            required>
                    </div>

                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">LiveSteam Min Price in € (*)</label>
                        <input type="number" class="form-control" name="livestream_min_price"
                            value="{{ $settings->livestreams->min_price ?? 999 }}" id="inputNanme4"
                            placeholder="Enter LiveSteam Min Price Here" required>
                    </div>


                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">LiveStream App Fee in % (*)</label>
                        <input type="number" class="form-control" name="livestream_app_fee"
                            value="{{ $settings->livestreams->app_fee ?? 20 }}" id="inputNanme4"
                            placeholder="Enter App Fee in %" min="0" max="100" required>
                    </div>


                    <div class="col-6">
                        <label for="inputNanme4" class="form-label">LiveStream App Vat in % (*)</label>
                        <input type="number" class="form-control" name="livestream_vat"
                            value="{{ $settings->livestreams->vat ?? 24 }}" min="0" max="100" id="inputNanme4"
                            placeholder="Enter Vat in %" required>
                    </div> --}}

                    {{-- <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div> --}}
                    <div class=" text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                    </div>
                </form><!-- Vertical Form -->

            </div>
        </div>
    </x-app-layout>

<div>
    <div class="pagetitle">
        <h1>Users Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payments</h5>
                        <span style="float: right">
                            <input type="text" class="rounded form-control" placeholder="Search"
                                wire:model.debounce.500ms="search" />
                        </span>

                        <!-- Table with stripped rows -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Seller</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">App Fee</th>
                                    <th scope="col">Stripe Fee</th>
                                    <th scope="col">Vat</th>
                                    <th scope="col">Credited</th>
                                    <th scope="col">Coupon</th>
                                    <th scope="col">Coupon Discount</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <th scope="row">{{ $payment->id }}</th>
                                        <td>{{ $payment->payer_name }}</td>
                                        <td>{{ $payment->receiver_name }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ explode('\\', $payment->payable_type)[2] }}</td>
                                        <td>{{ $payment->app_fee }}</td>
                                        <td>{{ $payment->service_fee }}</td>
                                        <td>{{ $payment->vat }}</td>
                                        <td>{{ $payment->amount - $payment->app_fee - $payment->service_fee - $payment->vat }}
                                        </td>
                                        <td>{{ $payment->coupon }}</td>
                                        <td>{{ $payment->coupon_discount }}</td>
                                        {{-- <td>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable" ><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-trash"></i></button>
                            </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                    <footer class="m-auto mb-2">{{ $payments->links() }}</footer>
                </div>
            </div>
        </div>
    </section>


    {{-- Delete User Model --}}
    <div class="modal fade" id="basicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this user?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" wire:click="deleteUser()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Basic Modal-->

    <!-- Modal Dialog Scrollable -->
    @if (isset($user) && !empty($user))
        <div class="modal fade" id="modalDialogScrollable" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <section class="section profile">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="pt-3 card-body">
                                            <!-- Profile Edit Form -->
                                            <div class="mb-3 row">
                                                <label for="profileImage"
                                                    class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <img class="rounded-circle" style="width:30%"
                                                        src="{{ $user->photo ?? asset('assets/img/avator.png') }}"
                                                        alt="Profile">
                                                    {{-- <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                          </div> --}}
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="Verified"
                                                    class="col-md-4 col-lg-3 col-form-label">Verified</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <i class="bi {{ $user->verified ? 'bi-toggle-on text-success' : 'bi-toggle-off' }}"
                                                        style="cursor: pointer; font-size:1.6rem"
                                                        wire:click="makeUserVerify({{ $user->id }})"></i>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                @if (Session::has('success'))
                                                    <span class="text-success">{{ Session::get('success') }}</span>
                                                @endif
                                                @error('message')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                                <label for="fullName"
                                                    class="col-md-4 col-lg-3 col-form-label">Name</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="name" type="text" class="form-control" id="Name"
                                                        wire:model.lazy="user.name" value="">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="Email"
                                                    class="col-md-4 col-lg-3 col-form-label">Username</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="user_name" type="text" class="form-control"
                                                        id="username" wire:model.lazy="user.user_name">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="Email"
                                                    class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="email" type="email" class="form-control" id="email"
                                                        wire:model.lazy="user.email">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="Email"
                                                    class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="phone" type="text" class="form-control" id="username"
                                                        wire:model.lazy="user.phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary"
                            wire:click="updateUserProfile({{ $user->id }})">Save changes</button>
                    </div>
                </div>
            </div>
        </div><!-- End Large Modal-->
    @endif
    <script>
        window.addEventListener('openEditModal', event => {
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
        })
    </script>
</div>

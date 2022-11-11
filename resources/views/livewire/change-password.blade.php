<div>
    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Change Password

                    @error('currentPassword')
                        <span class="text-danger">({{ $message }})</span>
                    @enderror
                    @error('newPassword')
                        <span class="text-danger">({{ $message }})</span>
                    @enderror

                    @if(Session::has('success'))
                        <span class="text-success">({{ Session::get('success') }})</span>
                    @endif

                    @if(Session::has('message'))
                        <span class="text-danger">({{ Session::get('message') }})</span>
                    @endif

                </h5>

                <!-- Horizontal Form -->
                <form wire:submit.prevent="updatePassword">
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" wire:model.lazy="currentPassword">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" wire:model.lazy="password">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control" wire:model.lazy="password_confirmation">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" wire:click="updatePassword">
                        Submit
                    </button>
                  </div>
                </form><!-- End Horizontal Form -->

              </div>
            </div>
        </div>
    </div>
</section>
</div>

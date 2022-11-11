<div>
    <div class="pagetitle">
        <h1>Send Push Notifications</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Notifications</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Notify User's</h5>

                <!-- Horizontal Form -->
                <form>
                  <div class="mb-3 row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputText" wire:model.lazy="title">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Body</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="inputEmail" wire:model.lazy="description"> </textarea>
                    </div>
                  </div>

                  <fieldset class="mb-3 row">
                    <legend class="pt-0 col-form-label col-sm-2">Send to</legend>
                    <div class="col-md-3">
                        <select class="form-select" id="validationDefault04" wire:model.lazy="selectedUsers" required>
                            <option value="" selected>choose option..</option>
                            <option value="all">all users</option>
                            <option value="unverified">unverified users</option>
                        </select>
                      </div>
                  </fieldset>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary" wire:click.prevent="handleUsersNotification">Submit</button>
                    <button type="reset" class="btn btn-secondary" wire:click.prevent="resetFields">Reset</button>
                  </div>
                </form><!-- End Horizontal Form -->

              </div>
            </div>
        </div>
    </div>
</section>
</div>

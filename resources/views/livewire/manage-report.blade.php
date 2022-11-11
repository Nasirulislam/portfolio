<div>
    <div class="pagetitle d-flex justify-content-between">
        <h1>Reports</h1>
    </div><!-- End Page Title -->
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
      {{-- <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade hide" id="onSuccess" role="alert">
        A simple success alert with solid color—check it out!
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
      <section class="section">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Reports</h5>
                  <span style="float: right">
                      <input type="text" class="rounded form-control" placeholder="Search" wire:model.debounce.500ms="search" />
                  </span>

                  <!-- Table with stripped rows -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">For</th>
                        <th scope="col">Message</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <th scope="row">{{$report->id}}</th>

                            <td>
                               {{$report->user->name}}
                            </td>
                            <td>
                                {{$report->type}}
                            </td>

                            <td>
                                <a href="#">{{explode('\\',$report->reportable_type)[2]}}</a>
                            </td>

                            <td>
                                {{$report->message}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>
                {{-- <footer class="m-auto mb-2">{{$constants->links()}}</footer> --}}
              </div>

            </div>
          </div>
        </section>


        {{-- Delete User Model --}}
        <div class="modal fade" id="basicModal" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete User</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this constant?</p>
                </div>
                <div class="modal-footer d-flex">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary btn-sm ms-1" data-bs-dismiss="modal" wire:click="deleteConstant()">Delete</button>
                </div>
              </div>
            </div>
        </div>
          <!-- End Basic Modal-->


          <script>

            window.addEventListener('closeDeleteModal', event => {
                $("#basicModal").modal('hide');
            })

            window.addEventListener('openDeleteModal', event => {
                $("#basicModal").modal('show');
            })
          </script>
</div>

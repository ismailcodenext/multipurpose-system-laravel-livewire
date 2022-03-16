<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Appointments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{route('admin.appointments.create')}}">
                            <button class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Add New Appointment
                            </button>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Client Name</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Status</td>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-edit mr-2"></i>
                                        </a>
                                        <a href="">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                        <div class="card-footer d-flex justify-content-end">

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete User</h5>
                </div>

                <div class="modal-body">
                    <h4>Are you want to delete user?</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                            class="fa fa-times mr-1"></i> Cancle
                    </button>
                    <button type="submit" wire:click.prevent="deleteUser" class="btn btn-danger"><i
                            class="fa fa-trash mr-2">Delete User</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

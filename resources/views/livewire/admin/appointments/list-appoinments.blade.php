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
                    <div class="d-flex justify-content-between mb-2">
                        <a href="{{route('admin.appointments.create')}}">
                            <button class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i> Add New Appointment
                            </button>
                        </a>
                        <div>
                            <input wire:model="searchTerm" type="text" class="form-control" placeholder="Search">
                        </div>
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
                                    <th scope="col">Note</th>
                                    <th scope="col">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($appointments as $appointment)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$appointment->client->name}}</td>
                                    <td>{{$appointment->date }}</td>
                                    <td>{{$appointment->time }}</td>
                                    <td>
                                        <span class="badge badge-{{ $appointment->status_badge }}">{{ $appointment->status }}</span>
                                    </td>
                                    <td>{{$appointment->note}}</td>
                                    <td>
                                        <a href="{{ route('admin.appointments.edit', $appointment) }}">
                                            <i class="fa fa-edit mr-2"></i>
                                        </a>
                                        <a href="" wire:click.prevent="confirmAppointmentRemoval({{ $appointment->id }})" >
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr class="text-center">

                                        <td colspan="7">
                                            <img src="{{ asset('backend/dist/img/undraw_Searching_re_3ra9.png') }}" style="height: 100px; width:100px;">
                                            <p class="mt-2">No Result Found.</p>

                                        </td>

                                    </tr>
                                @endforelse
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

        <x-confirmation-alert />

    </div>
</div>

</div>

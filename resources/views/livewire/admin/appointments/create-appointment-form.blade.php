<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Appointments</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="">Appointments</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent="createAppointment" autocomplete="off">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Appointment</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Patient Name:</label>
                                            <select class="form-control" wire:model.defer="state.client_id">
                                                <option value="">Select Patient</option>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="client">Doctor:</label>--}}
{{--                                                <select class="form-control" wire:model.defer="state.client_id">--}}
{{--                                                    <option value="">Select Doctor</option>--}}
{{--                                                    @foreach($clients as $client)--}}
{{--                                                        <option value="{{ $client->id }}">{{ $client->name }}</option>--}}
{{--                                                    @endforeach--}}

{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}


                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <div class="input-group date" id="appointmentDate"
                                                 data-target-input="nearest" data-appointmentdate="@this">
                                                <input wire:model.defer="state.date" type="text"
                                                       class="form-control datetimepicker-input"
                                                       data-target="#appointmentDate" id="appointmentDateInput">
                                                <div class="input-group-append" data-target="#appointmentDate"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment Time:</label>
                                            <div wire:ignore class="input-group date" id="appointmentTime"
                                                 data-target-input="nearest" data-appointmenttime="@this">
                                                <input type="text" class="form-control datetimepicker-input"
                                                       data-target="#appointmentTime" id="appointmentTimeInput">
                                                <div class="input-group-append" data-target="#appointmentTime"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment End Time:</label>
                                            <div wire:ignore class="input-group date" id="appointmentTime"
                                                 data-target-input="nearest" data-appointmenttime="@this">
                                                <input type="text" class="form-control datetimepicker-input"
                                                       data-target="#appointmentTime" id="appointmentTimeInput">
                                                <div class="input-group-append" data-target="#appointmentTime"
                                                     data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div wire:ignore class="form-group">
                                            <label for="note">Note:</label>
                                            <textarea id="note" data-note="@this" wire:model.defer="state.note"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i> Cancel
                                </button>
                                <button type="submit" id="submit" class="btn btn-primary"><i
                                        class="fa fa-save mr-1"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            $(document).ready(function () {
                $('#appointmentDate').datetimepicker({
                    format: 'L',
                });

                $('#appointmentDate').on("change.datetimepicker", function (e) {
                    let date = $(this).data('appointmentdate');
                    eval(date).set('state.date', $('#appointmentDateInput').val());
                });

                $('#appointmentTime').datetimepicker({
                    format: 'LT',
                });

                $('#appointmentTime').on("change.datetimepicker", function (e) {
                    let time = $(this).data('appointmenttime');
                    eval(time).set('state.time', $('#appointmentTimeInput').val());
                });

                $('#appointmentTime').on("change.datetimepicker", function (e) {
                    let time = $(this).data('appointmenttime');
                    eval(time).set('state.time', $('#appointmentTimeInput').val());
                });
            });
        </script>

        <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#note'))
                .then(editor => {
                    // editor.model.document.on('change:data',() => {
                    //     let note = $('#note').data('note');
                    //     eval(note).set('state.note', editor.getData());
                    // })
                    document.querySelector('#submit').addEventListener('click', () => {
                        let note = $('#note').data('note');
                        eval(note).set('state.note', editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush

</div>

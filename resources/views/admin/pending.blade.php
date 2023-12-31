@extends('admin.layouts')
@section('content')
    <main>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <h1 class="m-0">Pending Approval</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pending Appointments</li>
                        </ol>
                    </div>
                    @role('User')
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <button id="toggleAdd" class="btn btn-success btn-sm">Add New Appointment</button>
                        </div>
                    @endrole
                </div>
            </div>
        </div>

        @role('User')
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card p-3 shadow" style="overflow-x:auto;">
                            <table id='userPendingTable' class='display responsive table w-100' cellspacing="0">
                                <thead>
                                    <th width="30%">Appointment ID</th>
                                    <th width="50%">Date</th>
                                    <th width="20%">Status</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endrole


        @role('Admin')
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card p-3 shadow" style="overflow-x:auto;">
                            <table id='adminPendingTable' class='display responsive table w-100' cellspacing="0">
                                <thead>
                                    <th width="20%">Appointment ID</th>
                                    <th width="25%">Date</th>
                                    <th width="25%">Name</th>
                                    <th width="20%">Status</th>
                                    <th width="10%">Action</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endrole

    </main>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm" action="{{ route('appointment.store') }}" method="post">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col">
                                    @csrf
                                    <div class="row mb-2 form-group">
                                        <div class="col">
                                            <label class="form-label">Date</label>
                                            <input id="add_date_input" type="date" class="form-control" name="date"
                                                min="{{ date('Y-m-d') }}">
                                            <span class="text-danger" id="add_date_error"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btnAdd">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Approve Modal -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approve Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card shadow">
                        <div class="card-header bg-secondary pt-3 mp-0">
                            <div class="d-flex justify-content-between">
                                <span id="selected_name" class="h6"></span>
                                <span id="selected_date" class="h6"></span>
                            </div>
                        </div>

                        <div class="container p-2">
                            <div class="row">
                                <div class="col">
                                    <table id="medhistory_table" class="table">
                                        <thead>
                                            <th style="width: 50%"></th>
                                            <th style="width: 10%">Yes</th>
                                            <th style="width: 30%">Notes/Description</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <form id="approveForm" action="" method="post">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col">
                                    @csrf
                                    <input type="hidden" id="approve_id_input" name="id">
                                    You're about to approve the appointment <strong><span id="app_id"></span></strong>.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" id="btnApprove">Approve</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Modal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="cancelForm" action="" method="post">
                        <div class="container">
                            <div class="row mb-3">
                                <div class="col">
                                    @csrf
                                    <input type="hidden" id="cancel_id_input" name="id">
                                    <div class="row mb-2 form-group">
                                        <div class="col">
                                            <label class="form-label">Reason</label>
                                            <textarea class="form-control" id="reason" name="reason" cols="30" rows="3"></textarea>
                                            <span class="text-danger" id="reason_error"></span>
                                        </div>

                                    </div>
                                    You're about to cancel the appointment <strong><span
                                            id="cancel_app_id"></span></strong>.
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" id="btnCancel">Cancel Appointment</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let userPendingTable = $('#userPendingTable').DataTable({
            'columnDefs': [{
                'orderable': false, // set orderable false for selected columns
            }],
            responsive: true
        });

        let adminPendingTable = $('#adminPendingTable').DataTable({
            'columnDefs': [{
                'orderable': false, // set orderable false for selected columns
            }],
            responsive: true
        });

        function pad(n) {
            var string = "" + n;
            var pad = "0000";
            n = pad.substring(0, pad.length - string.length) + string;
            return "APP-" + n;
        }

        function userTableReload() {

            userPendingTable.clear();

            const url = "{{ route('appointment.getallpending') }}";

            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: url,
                data: "",
                dataType: "JSON",
                success: function(data) {
                    if (data.data.length === 0 || typeof data.data === "undefined" || typeof data
                        .data === null) {
                        userPendingTable.draw();
                    } else {

                        $.map(data.data, function(record) {

                            let status =
                                "<span class='px-3 py-1 bg-warning rounded-pill'>Pending</span>";
                            switch (record.status) {
                                case 1:
                                    status =
                                        "<span class='px-3 py-1 bg-primary rounded-pill'>Scheduled</span>";
                                    break;
                                case 2:
                                    status =
                                        "<span class='px-3 py-1 bg-danger rounded-pill'>Canceled</span>";
                                    break;
                                case 3:
                                    status =
                                        "<span class='px-3 py-1 bg-success rounded-pill'>Completed</span>";
                                    break;
                            }

                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            let date = new Date(record.date);
                            date = date.toLocaleDateString("en-US", options);

                            let id = pad(record.id);

                            const tr = $(
                                "<tr>" +
                                "<td>" + id + "</td>" +
                                "<td>" + date + "</td>" +
                                "<td>" + status + "</td>" +
                                "</tr>"
                            );

                            userPendingTable.row.add(tr[0]).draw();
                        });

                    }
                },
            });
        }

        function adminTableReload() {

            adminPendingTable.clear();

            const url = "{{ route('appointment.getallpending') }}";

            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: url,
                data: "",
                dataType: "JSON",
                success: function(data) {
                    if (data.data.length === 0 || typeof data.data === "undefined" || typeof data
                        .data === null) {
                        adminPendingTable.draw();
                    } else {

                        $.map(data.data, function(record) {

                            let status =
                                "<span class='px-3 py-1 bg-warning rounded-pill'>Pending</span>";
                            switch (record.status) {
                                case 1:
                                    status =
                                        "<span class='px-3 py-1 bg-primary rounded-pill'>Scheduled</span>";
                                    break;
                                case 2:
                                    status =
                                        "<span class='px-3 py-1 bg-danger rounded-pill'>Canceled</span>";
                                    break;
                                case 3:
                                    status =
                                        "<span class='px-3 py-1 bg-success rounded-pill'>Completed</span>";
                                    break;
                            }

                            var options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            let date = new Date(record.date);
                            date = date.toLocaleDateString("en-US", options);

                            let id = pad(record.id);

                            const tr = $(
                                "<tr>" +
                                "<td>" + id + "</td>" +
                                "<td>" + date + "</td>" +
                                "<td>" + record.user.name + "</td>" +
                                "<td>" + status + "</td>" +
                                "<td>" +
                                "<a class='toggleApprove text-success me-2' style='cursor:pointer' data-id='" +
                                record.id + "'>" +
                                "<i class='fa fa-check'></i>" +
                                "</a>" +
                                "<a class='toggleCancel text-danger me-2' style='cursor:pointer' data-id='" +
                                record.id + "'>" +
                                "<i class='fa fa-ban'></i>" +
                                "</a>" +
                                "</td>" +
                                "</tr>"
                            );

                            adminPendingTable.row.add(tr[0]).draw();
                        });

                    }
                },
            });
        }

        $(document).ready(function() {

            userTableReload();
            adminTableReload();

            $(document).on('click', '#toggleAdd', function() {

                $('#addModal').modal('show');
            });

            $('#btnAdd').on('click', function(ev) {
                ev.preventDefault();
                $('#btnAdd').prop('disabled', true);
                $('#btnAdd').html("<i class='fa fa-spinner fa-spin'></i> Loading");

                $('#add_date_error').html("");

                let addForm = $("#addForm")[0];
                let addFormData = new FormData(addForm);

                const url = "{{ route('appointment.store') }}";

                $.ajax({
                    type: "post",
                    url: url,
                    data: addFormData,
                    enctype: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(res) {
                        console.log(res);
                        $('#btnAdd').prop('disabled', false);
                        $('#btnAdd').html("Add");
                        if (res.status === 400) {
                            if (res.error.date != null) {
                                $('#add_date_error').html(res.error.date);
                            }
                        }

                        if (res.status === 200) {
                            $('#add_date_error').html("");

                            $('#add_date_input').val('');
                            new swal({
                                title: 'Success',
                                text: 'Inserted Successfully',
                                icon: 'success',
                            });
                            $('#addModal').modal('hide');
                            userTableReload();
                            adminTableReload();
                            
                        }

                        if (res.status === 405) {
                            $('#add_date_error').html("");

                            $('#add_date_input').val('');
                            if (res.errors === "MAX") {
                                new swal({
                                    title: 'Failed to add an appointment',
                                    text: 'Sorry, the maximum number of appointments in this day has been reached. Please consider selecting another time slot or check back later for availability. Thank you for your understanding.',
                                    icon: 'error',
                                });
                            }
                            if (res.errors === "EXIST") {
                                new swal({
                                    title: 'Failed to add an appointment',
                                    text: 'Oops! It looks like you\'ve already submitted an appointment for this day. Please choose a different date or time slot. Thank you.',
                                    icon: 'error',
                                });
                            }
                            $('#addModal').modal('hide');
                        }
                    },
                    error: function(res) {
                        console.log(res);
                        $('#btnAdd').prop('disabled', false);
                        $('#btnAdd').html("Add");
                    }
                });
            });


            $(document).on('click', '.toggleApprove', function() {
                var id = $(this).data('id');

                var url = "{{ route('appointment.select', ':id') }}";
                url = url.replace(':id', id);

                $('#medhistory_table tbody').empty();

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {

                        let id = pad(data.data[0].id);
                        let name = data.data[0].user.name;
                        var options = {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        let date = new Date(data.data[0].date);
                        date = date.toLocaleDateString("en-US", options);

                        $("#approveForm").attr('action', url);
                        $('#approve_id_input').val(data.data[0].id);
                        $('#app_id').html(id);
                        $('#selected_name').html(name);
                        $('#selected_date').html(date);

                        if (data.medhistory.length !== 0 || typeof data.medhistory !==
                            "undefined" ||
                            typeof data
                            .medhistory !== null) {
                            $.map(data.medhistory, function(record) {
                                let notes = "";
                                let tr = "";
                                if (record.notes != null) {
                                    notes = record.notes;
                                }

                                if (record.yes == 1) {
                                    tr = $(
                                        "<tr>" +
                                        "<td style='word-wrap: break-word;'> " +
                                        record.questions.question + " </td>" +
                                        "<td class='text-center'><input checked type='checkbox' name='yes[" +
                                        record.id +
                                        "]'  disabled='disabled'></td>" +
                                        "<td style='word-wrap: break-word;'>" +
                                        notes + "</td>" +
                                        "</tr>"
                                    );
                                } else {
                                    tr = $(
                                        "<tr>" +
                                        "<td style='word-wrap: break-word;'> " +
                                        record.questions.question + " </td>" +
                                        "<td class='text-center'><input type='checkbox' name='yes[" +
                                        record.id +
                                        "]'  disabled='disabled'></td>" +
                                        "<td style='word-wrap: break-word;'>" +
                                        notes + "</td>" +
                                        "</tr>"
                                    );
                                }


                                $('#medhistory_table tbody').append(tr[0]);
                            });

                            
                        }

                        $('#approveModal').modal('show');
                    },
                    error: function(data) {
                        console.log(data);
                        new swal({
                            title: 'Error',
                            text: 'Something went wrong',
                            icon: 'error'
                        });
                    }
                });

            });

            $('#btnApprove').on('click', function(ev) {
                ev.preventDefault();
                $('#btnApprove').prop('disabled', true);
                $('#btnApprove').html("<i class='fa fa-spinner fa-spin'></i> Loading");

                let approveForm = $("#approveForm")[0];
                let approveFormData = new FormData(approveForm);

                let id = approveFormData.get('id');

                var url = "{{ route('appointment.approve', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: "post",
                    url: url,
                    data: approveFormData,
                    enctype: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(res) {
                        console.log(res);
                        $('#btnApprove').prop('disabled', false);
                        $('#btnApprove').html("Approve");

                        if (res.status === 200) {
                            new swal({
                                title: 'Success',
                                text: 'Record Updated Successfully!',
                                icon: 'success',
                            });
                            userTableReload();
                            adminTableReload();
                            $('#approveModal').modal('hide');

                        }
                    },
                    error: function(res) {
                        new swal({
                            title: 'Success',
                            text: 'Failed to approve the record. Please try again.',
                            icon: 'success',
                        });
                    }
                }).done(function(data) {
                    $('#btnApprove').prop('disabled', false);
                    $('#btnApprove').html("Approve");
                });
            });

            $(document).on('click', '.toggleCancel', function() {
                var id = $(this).data('id');

                var url = "{{ route('appointment.select', ':id') }}";
                url = url.replace(':id', id);
                $('#reason').val('');

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        let id = pad(data.data[0].id);
                        console.log(id);

                        $("#cancelForm").attr('action', url);
                        $('#cancel_id_input').val(data.data[0].id);
                        $('#cancel_app_id').html(id);
                        $('#cancelModal').modal('show');
                    },
                    error: function(data) {
                        console.log(data);
                        new swal({
                            title: 'Error',
                            text: 'Something went wrong',
                            icon: 'error'
                        });
                    }
                });

            });

            $('#btnCancel').on('click', function(ev) {
                ev.preventDefault();
                $('#btnCancel').prop('disabled', true);
                $('#btnCancel').html("<i class='fa fa-spinner fa-spin'></i> Loading");

                // $('#cancel_reason_error').html("");

                let cancelForm = $("#cancelForm")[0];
                let cancelFormData = new FormData(cancelForm);

                let id = cancelFormData.get('id');

                var url = "{{ route('appointment.cancel', ':id') }}";
                url = url.replace(':id', id);

                $.ajax({
                    type: "post",
                    url: url,
                    data: cancelFormData,
                    enctype: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(res) {
                        console.log(res);
                        $('#btnCancel').prop('disabled', false);
                        $('#btnCancel').html("Cancel Appointment");

                        // if (res.status === 400) {
                        //     if (res.error.reason != null) {
                        //         $('#edit_reason_error').html(res.error.reason);
                        //     }
                        // }

                        if (res.status === 200) {
                            new swal({
                                title: 'Success',
                                text: 'Record Updated Successfully!',
                                icon: 'success',
                            });

                            userTableReload();
                            adminTableReload();
                            $('#cancelModal').modal('hide');
                        }
                    },
                    error: function(res) {
                        new swal({
                            title: 'Success',
                            text: 'Failed to cancel the record. Please try again.',
                            icon: 'success',
                        });
                    }
                }).done(function(data) {
                    $('#btnCancel').prop('disabled', false);
                    $('#btnCancel').html("Cancel Appointment");
                });
            });


        });

        
    </script>
@endsection

@push('footer-script')
@endpush

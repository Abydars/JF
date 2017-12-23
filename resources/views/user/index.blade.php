@extends('layouts.admin')

@section('top')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body pb0">
                    <div class="table-responsive table-bordered mb-lg">
                        <table class="table table-striped table-bordered table-bordered-force" id="users-table"
                               style="width: 100%;">
                            <thead>
                            <tr>
                                <th>User ID#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Registration Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    @include('layouts.delete-modal')
@endsection

@push('scripts')
<script>
    $(function () {
        var $users_table = $('#users-table').DataTable({
            responsive: true,
            errMode: 'throw',
            ajax: '{{ route("user.data") }}',
            fnInitComplete: function (settings) {

            },
            columns: [
                {
                    name: 'id',
                    data: function (row, type, val, meta) {
                        return row.id;
                    }
                },
                {
                    name: 'first_name',
                    data: 'first_name'
                },
                {
                    name: 'last_name',
                    data: 'last_name'
                },
                {
                    name: 'email',
                    data: 'email'
                },
                {
                    name: 'country',
                    data: 'country'
                },
                {
                    name: 'role.name',
                    data: 'role.name'
                },
                {
                    name: 'status',
                    data: 'status'
                },
                {
                    name: 'created_at',
                    data: 'created_at'
                },
                {
                    bSortable: false,
                    name: 'action',
                    data: function (row) {
                        return '<div class="btn-group table-actions">' +
                            '<a data-id="' + row.id + '" data-action="delete" href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>' +
                            '</div>';
                    }
                }
            ],
            dom: 'lTfgitp',
            buttons: [
                {
                    extend: 'pdf',
                    text: 'PDF',
                }, {
                    extend: 'csv',
                    text: 'CSV'
                }, {
                    extend: 'print',
                    text: 'Print'
                }
            ]
        });
        var $delete_modal = $('#delete-modal');
        var $delete_modal_ids = $('#delete-modal-ids');

        $(document).on('click', '.table-actions a[data-action]', function (e) {
            e.preventDefault();

            $btn = $(this);
            $action = $btn.data('action');
            $id = $btn.data('id');

            var data = $users_table.row($btn.parents('tr')).data();

            if ($action === 'delete') {
                $delete_modal.on('show.bs.modal', function () {
                    $delete_modal.find('#delete-modal-message').html('Are you sure to delete this user?');
                    $delete_modal_ids.val(data['id']);
                });
                $delete_modal.modal('show');
            } else if ($action === 'detail') {
                window.location.href = window.custom.url + '/user/' + data['id'] + '/edit';
            }
        });

        $delete_modal.on('click', '#delete-modal-confirmed', function () {

            $delete_modal.modal('hide');
            $.notify(window.custom.messages.processing);

            $.ajax({
                type: 'DELETE',
                url: '{{ url("admin/user") }}/' + $delete_modal_ids.val(),
                success: function (data) {
                    $.notify.closeAll();
                    $.notify(data);
                },
                error: function (jqXHR, textStatus) {
                    $.notify.closeAll();
                    $.notify(window.custom.messages.internal_error);
                },
                complete: function (jqXHR) {
                    $users_table.ajax.reload();
                }
            });
        });
    });
</script>
@endpush
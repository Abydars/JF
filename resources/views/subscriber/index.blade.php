@extends('layouts.admin')

@section('top')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-body pb0">
                    <div class="table-responsive table-bordered mb-lg">
                        <table class="table table-striped table-bordered table-bordered-force" id="subscribers-table"
                               style="width: 100%;">
                            <thead>
                            <tr>
                                <th width="10">ID#</th>
                                <th>Email Address</th>
                                <th>Date/Time</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="mb0 text-muted">Circulate Email</h4>
                </div>
                <div class="panel-body pt0 pb0">
                    {!! Form::open(['route' => ['subscriber.spread'], 'role' => 'form', 'method' => 'POST', 'data-parsley-validate' => '', 'novalidate' => ' ', 'class' => 'mb-lg']) !!}
                    {!! Form::textarea('message', false, ['id' => 'input-message', 'placeholder' => 'Enter message to spread news', 'autocomplete' => 'off', 'required', 'class' => 'form-control']) !!}
                    <button type="submit" class="btn btn-primary mt-lg">Send</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')

@endsection

@push('scripts')
<script>
    $(function () {
        var $subscribers_table = $('#subscribers-table').DataTable({
            responsive: true,
            errMode: 'throw',
            ajax: '{{ route("subscriber.data") }}',
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
                    name: 'email',
                    data: 'email'
                },
                {
                    name: 'datetime',
                    data: 'datetime'
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
    });
</script>
@endpush
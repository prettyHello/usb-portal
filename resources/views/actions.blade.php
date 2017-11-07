@extends('layouts.app')

@section("script")
    @parent
    {{Html::script(asset("js/documents.js"))}}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Documents</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="index_table" class="table table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th>Document title</th>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Date</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach (\App\Http\Controllers\DocumentUserController::getAllDocumentUser() as $doc_user)

                                <tr>
                                    <th>{{ $doc_user->doc_name }}</th>
                                    <th>{{ $doc_user->user_name }}</th>
                                    <th>{{ $doc_user->action }}</th>
                                    <th>{{ $doc_user->created_at }}</th>
                                    <th><a class="btn btn-info" href="{{ 'uploads/' . $doc_user->doc_name }}">Show</a></th>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
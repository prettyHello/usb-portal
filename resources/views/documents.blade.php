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
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>User</th>
                                    <th>Creation date</th>
                                    <th>Show</th>
                                    <th>Download</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach (App\Document::all() as $doc)
                                <tr>
                                    <th>{{$doc->id}}</th>
                                    <th>{{$doc->name}}</th>
                                    <th>{{$doc->extension}}</th>
                                    <th>{{$doc->id_user}}</th>
                                    <th>{{$doc->created_at}}</th>
                                    <th><a class="btn btn-info" href="{{ 'uploads/' . $doc->name }}">Show</a></th>
                                    <th><a class="btn btn-danger" href="document/{{ $doc->id }}">Download</a></th>
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
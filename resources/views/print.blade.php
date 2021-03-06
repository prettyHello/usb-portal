@extends('layouts.app')

@section("script")
    @parent
    {{Html::script(asset("js/print.js"))}}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    echo Form::open(array('url' => '/uploadfile','files'=>'true'));
                    echo 'Select the file to upload.';
                    echo Form::file('doc');
                    echo Form::submit('Upload File');
                    echo Form::close();
                ?>
            </div>

            <div class="col-sm-12" style="margin-top: 25px">
                <div class="panel panel-default">
                    <div class="panel-heading">Printing</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="print_table" class="table table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Show</th>
                                <th>Download</th>
                                <th>Print</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach (\App\Http\Controllers\DocumentController::getAllDocuments() as $doc)
                                    <tr>
                                        <th>{{$doc->doc_id}}</th>
                                        <th>{{$doc->doc_name}}</th>
                                        <th>{{$doc->extension}}</th>
                                        <th>{{$doc->user_name}}</th>
                                        <th>{{$doc->created_at}}</th>
                                        <th><a class="btn btn-info" href="{{ '/document/show/' . $doc->doc_id }}">Show</a></th>
                                        <th><a class="btn btn-danger" href="/document/{{ $doc->doc_id }}">Download</a></th>
                                        <th><a class="btn btn-success" href="/print/{{ $doc->doc_id }}"><span>Print</span></a></th>
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
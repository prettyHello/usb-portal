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
                                <th>Print</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>0</td>
                                    <td>test</td>
                                    <td>pdf</td>
                                    <td>ffadeur</td>
                                    <td>10/12/2012</td>
                                    <td><a class="btn btn-success"><span class="glyphicon glyphicon-print"></span></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
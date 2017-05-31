@extends('base::layouts.main', ['pagetitle' => 'Home / Downloads'])

@section('title')
    <h3>Downloads</h3>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Catalogus</h3>
                </div>
                <div class="panel-body">
                    <p>
                        {!! $catalog->getValue() !!}
                    </p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Flyers</h3>
                </div>
                <div class="panel-body">
                    <p>
                        {!! $flyers->getValue() !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Artikel bestanden</h3>
                </div>
                <div class="panel-body">
                    <p>
                        {!! $files->getValue() !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

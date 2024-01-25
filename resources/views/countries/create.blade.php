@extends("layouts.app")
@section("content")
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                Add New Country
            </div>
        </div>
        @include('countries.form')
    </div>
@endsection

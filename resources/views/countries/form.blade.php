@extends('layouts.app')
@section('content')
<!-- left column -->
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <!-- /.card-header -->
        <!-- form start -->
            @if($method == 'POST')
                {!! Form::open(['url' => $action, 'method' => $method, 'enctype'=>'multipart/form-data', 'files' => true]) !!}
            @elseif ($method == 'PUT')
                {!! Form::model($country, ['url' => [$action], 'method'=>$method , 'enctype'=>'multipart/form-data', 'files' => true]) !!}
                {!! Form::hidden('country_id', null, []) !!}
            @endif
            <div class="card-body">
                @foreach ($locales as $locale)
                    @if($method == 'PUT')
                        @foreach ($country->localizations as $localization)
                             @if ($localization->locale_id === $locale->id)
                                <div class="form-group">
                                    <label for="title">{{ 'Title '.$locale->name }}</label>
                                    {!! Form::text('title['.$locale->code.']', $method == 'PUT' ? $localization->title : old('title['.$locale->code.']'), ["class"=>"form-control", "id" => "title", "placeholder" => 'Title '.$locale->name ]) !!}
                                    @error('title'.$locale->id)
                                        <small class="aleart text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ 'Description '.$locale->name }}</label>
                                    {!! Form::text('description['.$locale->code.']', $method == 'PUT' ? $localization->description : old('description['.$locale->code.']'), ["id" => "description", "class"=>"form-control", "placeholder" => 'Description '.$locale->name ]) !!}
                                    @error('description'.$locale->id)
                                        <small class="aleart text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif
                        @endforeach
                        @else
                            <div class="form-group">
                                <label for="title">{{ 'Title '.$locale->name }}</label>
                                {!! Form::text('title['.$locale->code.']', old('title['.$locale->code.']'), ["class"=>"form-control", "id" => "title", "placeholder" => 'Title '.$locale->name ]) !!}
                                @error('title'.$locale->id)
                                    <small class="aleart text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ 'Description '.$locale->name }}</label>
                                {!! Form::text('description['.$locale->code.']', old('description['.$locale->code.']'), ["id" => "description", "class"=>"form-control", "placeholder" => 'Description '.$locale->name ]) !!}
                                @error('description'.$locale->id)
                                    <small class="aleart text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    @endif
                @endforeach
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    @if($method == 'POST')
                        Save
                    @elseif ($method == 'PUT')
                        Update
                    @endif
                </button>
            </div>
        </form>
    </div>
    <!-- /.card -->

</div>
@stop

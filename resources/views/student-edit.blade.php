@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/plugin/datepicker/datepicker.min.css" />
@endsection

@section('content')
    <div class="container">

        @include('layouts.alert')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard > Students List > Edit
                        <span class="float-right">
                            <a class="btn btn-sm btn-primary" href="{{ route('students.index') }}">Back to list</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('students.update', ['id' => $student->id]) }}" method="POST">
                            {!! csrf_field() !!}
                            {!! method_field('PUT') !!}
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Student Name</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="name"
                                           placeholder="e.g. Hafiz Suhaimi" value="{{ $student->name }}">
                                    @if($errors->has('name'))
                                        <small class="form-text text-danger">
                                            {{ implode(' ', $errors->get('name')) }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input id="dob"
                                           type="text"
                                           class="form-control"
                                           name="dob"
                                           data-toggle="datepicker"
                                           placeholder="Select Date of Birth" value="{{ $student->dob }}">
                                    @if($errors->has('dob'))
                                        <small class="form-text text-danger">
                                            {{ implode(' ', $errors->get('dob')) }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nationality</label>
                                <div class="col-sm-10">
                                    <select name="nationality" class="form-control">
                                        <option value="">Select nationality</option>
                                        @foreach(config('country') as $country)
                                            <option value="{{ $country }}"
                                                {{ $student->nationality == $country ? 'selected':''}}>{{ $country }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('nationality'))
                                        <small class="form-text text-danger">
                                            {{ implode(' ', $errors->get('nationality')) }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                           class="form-control"
                                           name="phone"
                                           placeholder="Insert phone number" value="{{ $student->phone }}">
                                    @if($errors->has('phone'))
                                        <small class="form-text text-danger">
                                            {{ implode(' ', $errors->get('phone')) }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-light">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ url('/') }}/plugin/datepicker/datepicker.min.js" defer></script>
    <script type="text/javascript" defer>
        $(function(){
            $('#dob').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>
@endsection

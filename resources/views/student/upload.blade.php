@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">file upload</div>

                <div class="card-body">
                    {{--enctype属性を追加必要です--}}
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">please choose file</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="source" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    confirm upload
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('dashboard.dashboard')
@section('content')
<div class="wrapper">
    <div class="container" style="width: 50%">
            <div class=" bg-dark border-b border-gray-200">
             <div class="row p-3">
                <div class="col-10">
                    <h5 class="card-title text-light">New user:</h5>
                </div>
                <div class="col-2">
                    <a href="{{ url('/users') }}" class="btn btn-secondary btn-block">Back</a>
                </div>
            </div>
            </div>
            <div class="p-3">
                <form action="{{ url('users') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                      <input type="text" name="name" class="form-control"  placeholder="Enter name" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last" class="form-control"  placeholder="Enter lastname" required value="{{ old('last') }}">
                      </div>
                      <div class="form-group">
                        <input type="email" name="email" class="form-control"  placeholder="Enter email" required value="{{ old('email') }}">
                      </div>
                    <button type="submit" class="btn btn-success">Save</button>
                  </form>
            </div>
    </div>
</div>
@endsection
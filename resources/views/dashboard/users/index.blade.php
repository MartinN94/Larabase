@extends('dashboard.dashboard')

@section('content')
<div class="wrapper">
    <div class="container">
            <div class=" bg-dark border-b border-gray-200">
             <div class="row p-3">
                <div class="col-10">
                    <h5 class="card-title text-light">Users list:</h5>
                </div>
                <div class="col-2">
                    <a href="{{ url('/users/create') }}" class="btn btn-primary btn-block">Add new user</a>
                </div>
            </div>
            </div>
            <table class="table">
                <tbody>
                  <tr>
                    <td  >
                    <div style="width: 100%;">
                        @foreach ($users as $id => $user)      
                        <div class="row p-5 my-5 border bg-secondary">
                            <div class="col-10">
                                <h5 class="card-title">Firstname: <b>{{ $user['name'] }}</b></h5>
                                <h5 class="card-title">Lastname: <b>{{ $user['last'] }}</b></h5>
                                <h5 class="card-title">Email: <b>{{ $user['email'] }}</b></h5>
                            </div>
                            <div class="col-2">
                                <a href="{{ url('/users/update/'.$id) }}" class="btn btn-warning btn-block">Edit</a>
                                <br>
                                <form action="{{ url('/users/'.$id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </td>
                  </tr>
                </tbody>
              </table>
    </div>
</div>
@endsection
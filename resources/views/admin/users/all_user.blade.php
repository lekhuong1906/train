@extends('admin.admin_layout')
@section('content')
    <div class="row-cols-auto container-fluid">
        <form class="form-inline">
            <div class="form-group row">
                <label for="type_status" class="col-sm col-form-label">Type Account</label>
                <div class="col-sm-4">
                    <select class="form-control" name="type_account">
                        <option value="1">Admin</option>
                        <option value="0">Guest</option>
                    </select>
                </div>
                <button class="btn btn-default sm-2" type="submit">Submit</button>
            </div>

        </form>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> List Account User</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            User Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Identity Card
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Type Account
                        </th>
                        <th class="text-right">
                        </th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->identity_card}}
                                </td>
                                <td>
                                    {{$user->phone}}
                                </td>
                                <td>
                                    {{$user->address}}
                                </td>
                                <td>
                                    {!! $user->level_account? 'Admin' : 'Guest' !!}
                                </td>
                                <td class="text-right">
                                    <a href="{!! $user->level_account? url('/profile/'.$user->id) : '#' !!}"><i
                                            class="nc-icon nc-alert-circle-i"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->appends(request()->all())->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

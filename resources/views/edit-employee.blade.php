@extends('app')
@section('title', 'Home - Edit Employee')
@section('containt')
    <div class="container w-50 mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0)" onclick="history.back()" class="btn btn-warning float-left"><i
                        class="fa fa-backward"></i> Back</a>
                <h4 class="text-center text-primary text-uppercase">Edit Employee</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('addEmployee') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $empdata->id }}">
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <select name="company_id" id="" class="form-control">
                            <option selected disabled>Choose Company</option>
                            @foreach ($datas as $company)
                                <option value="{{ $company->id }}"
                                    <?= $company->id == $empdata->company_id ? 'selected' : '' ?>>{{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="fname" placeholder="First Name"
                            value="{{ $empdata->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="lname" placeholder="Last Name"
                            value="{{ $empdata->last_name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                            value="{{ $empdata->email }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                            value="{{ $empdata->phone }}" minlength="10" maxlength="10">
                    </div>

                    <div class="btn text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

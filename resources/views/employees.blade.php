@extends('app')
@section('title', 'Home - Employee')
@section('containt')
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                <a href="{{route('addEmployeeForm')}}" class="btn btn-warning float-left"><i class="fa fa-plus"></i> Add New
                    Employee</a>
                <h4 class="text-center text-primary text-uppercase">Employees</h4>
            </div>
            <div class="card-body">
                @if (session()->get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ session()->get('success') }}</strong>
                </div>
            @endif
                <div class="table-responsive">
                    <table class="table" style="width: 100%" id="company">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Company Name</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($datas as $employee)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td><a href="{{ route('editEmployeeForm', ['eid' => $employee->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <a
                                            href="{{ route('delemployee', ['eid' => $employee->id]) }}"
                                            class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#company').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endpush

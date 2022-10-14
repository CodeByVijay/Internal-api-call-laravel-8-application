@extends('app')
@section('title', 'Home - Company')
@section('containt')
    <div class="container mt-4 mb-4">

        <div class="card">
            <div class="card-header">
                <a href="{{route('addCompanyForm')}}" class="btn btn-success float-left"><i class="fa fa-plus"></i> Add Company</a>
                <h4 class="text-center text-primary text-uppercase">Companies</h4>

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
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Company Email</th>
                            <th>Company Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($datas as $company)
                        <?php $image = explode('/',$company->logo); ?>
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><img src="<?= asset('storage/logo/'.$image[2]); ?>" alt="logo" width="100" height="100"></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td><a href="{{route('employee',['cid'=>$company->id])}}" class="btn btn-success" title="See all employees"><i class="fa fa-eye"></i></a>  <a href="{{route('editCompanyForm',['cid'=>$company->id])}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a> <a href="{{route('deleteCompany',['cid'=>$company->id])}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td>
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
        $('#company').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
  </script>
@endpush

@extends('app')
@section('title', 'Home - Edit Company')
@section('containt')
    <div class="container w-50 mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                <a href="javascript:void(0)" onclick="history.back()" class="btn btn-warning float-left"><i
                        class="fa fa-backward"></i> Back</a>
                <h4 class="text-center text-primary text-uppercase">Edit Company</h4>
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
                <form action="{{ route('addCompany') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$datas->id}}">
                    <div class="form-group">
                        <label for="name">Company Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Comapany Name" value="{{$datas->name}}">
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-lg-8">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" class="form-control" id="logo">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <?php $image = explode('/',$datas->logo); ?>
                            <img src="<?= asset('storage/logo/'.$image[2]); ?>" alt="logo" width="100" height="100">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="Comapany Email" value="{{$datas->email}}">
                    </div>

                    <div class="form-group">
                        <label for="Website">Website</label>
                        <input type="text" name="website" class="form-control" id="Website"
                            placeholder="Comapany Website" value="{{$datas->website}}">
                    </div>

                    <div class="btn text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

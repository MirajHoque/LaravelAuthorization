@extends('layout.master')

@section('content')

<style>
    .bootstrap-tagsinput {
     width: 100%;
    }
    .bootstrap-tagsinput .tag {
         margin-right: 2px;
         color: white !important;
         background-color: #4137ce;
         padding: .2em .6em .3em;
         font-size: 100%;
         font-weight: 700;
         vertical-align: baseline;
         border-radius: .25em;
      }
      
</style>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Role Create</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Role Create</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="py-1">
                <div class="button-items d-flex justify-content-end">
                    <a href="{{ route('role.index') }}" type="button"
                        class="btn btn-success waves-effect waves-light">List</a>
                </div>
            </div>
            <div class="card">
                <form action="{{ route('role.store') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data" files="true">
                    @csrf
                    <div class="card-body ">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name" class="col-form-label">Role Name</label>
                                <input id="name" type="text" name="name" placeholder="role name"
                                    class="form-control" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="permission" class="col-form-label">Add Permission</label>
                                <input id="permission" data-role="tagsinput" type="text" name="permission" placeholder="Add Permission" value=""
                                    class="bootstrap-tagsinput form-control" >
                                @error('permission')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        
                        <div class="form-group row">
                            <div class="col-md-1">
                                <div class="button-items float-right">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


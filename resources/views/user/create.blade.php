@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">User Info Add</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Info Add</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="py-1">
                <div class="button-items d-flex justify-content-end">
                    <a href="{{ route('user.index') }}" type="button"
                        class="btn btn-success waves-effect waves-light">List</a>
                </div>
            </div>
            <div class="card">
                <form action="{{ route('user.store') }}" method="POST" autocomplete="off"
                    enctype="multipart/form-data" files="true">
                    @csrf
                    <div class="card-body ">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="name" class="col-form-label">Name</label>
                                <input id="name" type="text" name="name" placeholder="name"
                                    class="form-control" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="email" class="col-form-label">Email</label>
                                <input id="email" type="text" name="email" placeholder="email" 
                                    class="form-control" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="password" class="col-form-label">Password</label>
                                <input id="password" type="text" name="password" placeholder="password" 
                                    class="form-control" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="role" class="col-form-label">Role</label>
                               <select name="role" id="role" class="form-control" required>
                                    <option value="" selected disabled>Select any Role</option>
                                    @foreach ($roles as $role)
                                        <option data-role-id="{{ $role->id }}" data-role-slug="{{ $role->slug }}" value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                               </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div id="permission_box">
                                    <label for="permission_box" class="col-form-label">Permission</label>
                                    <div id="permission_checkbox_list">

                                    </div>  
                                </div>
                                @error('name')
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

@section('js')
    <script>
        $(document).ready(function () {
            var permissionBox = $("#permission_box");
            var permissionCheckBoxList = $("#permission_checkbox_list");

            permissionBox.hide();

            $("#role").change(function () { 
                var role = $(this).find(':selected');
                var roleId = role.data('role-id');
                var roleSlug = role.data('role-slug');

                permissionCheckBoxList.empty();

                $.ajax({
                    type: "get",
                    url: "{{ route('user.create') }}",
                    data: { roleId:roleId,  roleSlug:roleSlug},
                    dataType: "json",
                    success: function (response) {
                        //console.log(response);
                        permissionBox.show();

                        $.each(response, function (index, element) { 
                            $(permissionCheckBoxList).append(
                                '<div class="custom-control custom-checkbox">'+
                                '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+element.slug+'" value="'+ element.id +'" >' +
                                '<label class="custom-control-label" for="'+element.slug+'">' + element.name + '</label>' +
                            '</div>' 
                            );
                            
                        });
                    }
                });
                
            });
        });
    </script>
@endsection


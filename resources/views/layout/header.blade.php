   <header id="page-topbar">
       
       <style>
           .logo-lg img{
               width: 100px;
               height: 60px;

           }
       </style>

       <div class="navbar-header">
           <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box text-left">
                   <a href="" class="logo logo-dark">
                       <span class="logo-sm">
                           <img src="{{ asset('frontend/images/logo.png') }}" alt="" class="w-100">
                       </span>
                       <span class="logo-lg">
                           <img src="{{ asset('frontend/images/logo.png') }}" alt="" class="">
                       </span>
                   </a>
                   <a href="" class="logo logo-light">
                       <span class="logo-sm">
                           <img src="{{ asset('frontend/images/logo.png') }}" alt="" class="w-100">
                       </span>
                       <span class="logo-lg">
                           <img src="{{asset('frontend/images/logo.png') }}" alt="" class="">
                       </span>
                   </a>
               </div>
               {{-- __button bar__ --}}
               <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                   id="vertical-menu-btn">
                   <i class="fa fa-fw fa-bars"></i>
               </button>
           </div>

           <div class="d-flex">
               <div class="dropdown d-inline-block d-lg-none ml-2">
                   <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="mdi mdi-magnify"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                       aria-labelledby="page-header-search-dropdown">

                       <form class="p-3">
                           <div class="form-group m-0">
                               <div class="input-group">
                                   <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username" name="q">
                                   <div class="input-group-append">
                                       <button class="btn btn-primary" type="submit"><i
                                               class="mdi mdi-magnify"></i></button>
                                   </div>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
               <div class="dropdown d-inline-block">
                   <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <img class="rounded-circle header-profile-user"
                           src="{{ asset('backend/assets/images/users/user-1.png') }}" alt="Header Avatar">
                       <span class="d-none d-xl-inline-block ml-1" key="t-henry"></span>
                       <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                   </button>
                   <div class="dropdown-menu dropdown-menu-right">
                       <!-- item-->
                       {{-- <a class="dropdown-item" href="{{ route('admin.user.edit', encrypt(auth()->user()->id)) }}"><i --}}
                               {{-- class="bx bx-user font-size-16 align-middle mr-1"></i>
                           <span key="t-profile">Profile</span></a> --}}

                       {{-- <a class="dropdown-item d-block" href="{{ route('admin.setting.index') }}"><i --}}
                               {{-- class="bx bx-wrench font-size-16 align-middle mr-1"></i> <span
                               key="t-settings">Settings</span></a> --}}
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item text-danger" href="">
                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>
                         <span key="t-logout">Logout</span>
                        </a>
                        
                        <a class="dropdown-item" href="">
                            <i class="fa-solid fa-key"></i>
                             <span key="t-logout">Change Password</span>
                        </a>
                   </div>
               </div>
           </div>
       </div>
   </header>

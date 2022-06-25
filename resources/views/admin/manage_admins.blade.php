<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Manage Admins</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link type="text/css" href="{{ asset('css/admin/main.min.css') }}" rel="stylesheet">
      <link type="text/css" href="{{ asset('css/admin/profile.css') }}" rel="stylesheet">

   </head>
   <body>
      @include("admin.sidebar")
      <main class="content">
        @include("admin.header")
         <div class="d-flex justify-content-between w-100 flex-wrap mt-4">
           <div class="mb-3 mb-lg-0">
              <h1 class="h4">Manage Admins</h1>
           </div>
         </div>
         <div class="card border-0 shadow mb-4 mt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0 rounded-start">Username</th>
                                <th class="border-0">Full Name</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($admins as $adm)
                            <tr>
                                <td class="border-0">
                                    <a href="#" class="d-flex align-items-center">
                                      <img class="me-2 image image-small rounded-circle" src="images/{{ $adm->profile_pic }}" style="width: 35px; height: 35px">
                                      <div><span class="h6">{{ $adm->username }}</span></div>
                                    </a>
                                </td>
                                <td class="border-0 fw-bold">{{ $adm->full_name }}</td>
                                <td class="border-0 fw-bold">{{ $adm->email }}</td>
                                <td class="border-0">
                                  <span>
                                    <a href="#">
                                      <img src="images/trash.svg" alt="delete" width="15" height="15">
                                    </a>
                                  </span>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
         <div class="col-12 col-xl-12 mt-4">
           <div class="card card-body border-0 shadow mb-4">
             <h2 class="h5 mb-4">Create New Admin</h2>
             <form method="post" action="{{ route('manage_admins') }}" class="validate-form mt-2 pt-50" enctype=multipart/form-data>
              @csrf
             <div class="media mb-2">
                <div class="avatar-wrapper">
                  <img class="profile-pic" src="images/profile.png" />
                  <div class="upload-button"></div>
                  <input class="file-upload" type="file" id="profile_pic" name="profile_pic" accept="image/*"/>
                </div>

              </div>
              <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                  <label class="form-label" for="username">Username*</label>
                  <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                  <label class="form-label" for="email">Email*</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                  <label class="form-label" for="full_name">Full Name</label>
                  <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                  <label class="form-label" for="password">Password*</label>
                  <input type="text" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                  <button type="submit" class="btn btn-primary mt-1 mr-2">Save changes</button>
                </div>
              </div>
            </form>
           </div>
         </div>
      </main>
      <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
      <script src="{{ asset('js/admin/manageadmins.js') }}"></script>
      <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/admin/sidebar.js') }}"></script>

   </body>
</html>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>
         Add Proxy Servers
      </title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link type="text/css" href="{{ asset('css/admin/main.min.css') }}" rel="stylesheet">
   </head>
   <body>
    @include("admin.sidebar")
      <main class="content">
        @include("admin.header")
         <div class="col-12 col-xl-12 mt-4">
           <div class="card card-body border-0 shadow mb-4">
             <h2 class="h5 mb-4">Add Proxy Servers</h2>
             <form action="{{ route('proxy_list') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12 mb-3">
                      <div>
                        <label for="proxy_type">Type</label>
                        <select class="form-control" id="proxy_type" name="proxy_type" required>
                          <option value="http">HTTP</option>
                          <option value="socks5">SOCKS5</option>
                        </select>                      
                      </div>
                  </div>
                  <div class="col-md-12 mb-3">
                      <div>
                        <label>Enter the Proxy list in the format: ip:port:username:password</label>
                        <textarea class="form-control" name="proxy_list" rows="8" placeholder="109.85.112.150:8080:username:password" required></textarea>
                      </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-secondary d-inline-flex align-items-center me-2 create_proxy" style="float: right;">
                    <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Create
                </button>
             </form>
           </div>
           @if($proxyList->count())
           <div class="card card-body border-0 shadow mb-4">
            <div class="row">
                <div class="col-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Ip</th>
                        <th scope="col">Port</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody style="vertical-align: middle;">
                      @foreach ($proxyList as $proxy)
                        <tr id="{{ $proxy->id }}">
                            <th scope="row">{{ $proxy->ip }}</th>
                            <td>{{ $proxy->port }}</td>
                            <td>**********</td>
                            <td>**********</td>
                            <td>{{ $proxy->type }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary check_proxy" id="check_{{ $proxy->id }}" data-proxy-id="{{ $proxy->id }}">Check</button>
                                <button type="button" class="btn btn-sm btn-danger delete_proxy" data-proxy-id="{{ $proxy->id }}">Delete</button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
           </div>
           @endif
         </div>
      </main>
      <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/admin/sidebar.js') }}"></script>
      <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script src="{{ asset('js/admin/handleProxy.js') }}"></script>
   </body>
</html>

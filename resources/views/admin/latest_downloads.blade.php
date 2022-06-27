<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Latest Downloads</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link type="text/css" href="{{ asset('css/admin/main.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
   </head>
   <body>
      @include("admin.sidebar")
      <main class="content">
         @include("admin.header")
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div>
              <div class="d-flex justify-content-between w-100 flex-wrap">
                 <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Latest Downloads</h1>
                 </div>
              </div>
            </div>
            <div>
                <a class="btn btn-primary mt-1 me-1" id="delButton">Delete All</a>
            </div>
         </div>
         <div class="card">
            <div class="table-responsive py-4">
               <table class="table table-flush" id="datatable">
                  <thead class="thead-light">
                     <tr>
                        <th>Source</th>
                        <th>Thumbnail</th>
                        <th>Url</th>
                        <th>Download Date</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach ($videos as $video)
                      <tr>
                          <td class="ver-middle"><span class="fw-normal">{{ $video->source }}</span></td>
                          <td class="ver-middle">
                              <a href="#" class="d-flex align-items-center">
                                <img src="{{ $video->thumbnail }}" class="thumbnail rounded-circle-thumb me-3" alt="thumbnail">
                              </a>
                          </td>
                          <td class="ver-middle">
                            <p class="text-xs font-weight-bold mb-0"></p>
                              <div class="form-group">
                                <a href="{{ $video->web_url }}" target="_blank" class="input-group">
                                  <input type="text" value="{{ $video->web_url }}" class="form-control cursor-pointer" readonly="">
                                  <span class="input-group-text"><i class="fas fa-external-link-alt"></i></span>
                                </a>
                              </div>
                          </td>
                          <td class="ver-middle">
                              <span class="fw-normal d-flex align-items-center">
                              {{ $video->created_at->diffForHumans() }}
                              </span>
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </main>
      <!-- Core Libs -->
      <script src="{{ asset('js/admin/simple-datatables.min.js') }}"></script>
      <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/admin/sidebar.js') }}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      <script type="text/javascript">
      var dataTableEl = document.getElementById('datatable');
      if (dataTableEl) {
          const dataTable = new simpleDatatables.DataTable(dataTableEl);
      }

      var delButton = document.getElementById('delButton')
      delButton.addEventListener('click', () => {
         Swal.fire({
            icon: 'error',
            title: 'Failed...',
            text: 'This feature was disabled for demo',
         })
      })
      </script>

   </body>
</html>

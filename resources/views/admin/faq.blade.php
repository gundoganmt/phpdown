<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>
         Create FAQs
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
             <h2 class="h5 mb-4">Create FAQ</h2>
             <form action="{{ route('faq') }}" method="post">
                 @csrf
                 <div class="row">
                    <div class="col-md-12 mb-3">
                       <div>
                          <label for="question">FAQ Question</label>
                          <input class="form-control" id="question" name="question" type="text" placeholder="Enter FAQ Question" required>
                       </div>
                    </div>
                    <div class="col-md-12 mb-3">
                       <div>
                          <label>FAQ Answer</label>
                          <textarea class="form-control" name="answer" rows="8" placeholder="Answer FAQ" required></textarea>
                       </div>
                    </div>
                 </div>
                 <button type="submit" class="btn btn-secondary d-inline-flex align-items-center me-2" style="float: right;">
                     <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                     Create
                 </button>
              </form>
           </div>
         </div>
         @foreach($faqs as $faq)
           <div class="row mb-4">
             <div class="col-10">
               <div class="card accordion-item">
                  <h2 class="accordion-header" id="{{ $faq->id }}">
                    <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#faq-{{ $faq->id }}" aria-expanded="false" aria-controls="faq-{{ $faq->id }}">
                    {{ $faq->question }}
                    </button>
                  </h2>

                  <div id="faq-{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="{{ $faq->id }}">
                    <div class="accordion-body">
                    {{ $faq->answer }}
                    </div>
                  </div>
               </div>
             </div>
             <div class="col-2">
               <a href="/delete_faq/{{ $faq->id }}" class="btn btn-danger mt-1 me-1">Delete</a>
             </div>
           </div>
         @endforeach
      </main>
      <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/admin/sidebar.js') }}"></script>

   </body>
</html>

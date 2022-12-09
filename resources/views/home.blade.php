@extends('layouts.app')

@section('content')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/helper.js') }}?v={{ time() }}" defer></script>
  <script src="{{ asset('js/main.js') }}?v={{ time() }}" defer></script>

  <div class="container">
    <x-dashboard />
    <div class="row justify-content-center mt-5">
      <div class="col-12">
        <div class="card shadow  text-white bg-dark">
          <div class="card-header">Coding Challenge - Network connections        </div>
          <div class="card-body">
            <div class="container">
              <ul class="nav nav-tabs">
                <li class="active"> <a data-toggle="tab" href="#suggestions">Suggestions ({{ $suggested_users->count()  }}) </a> </li>
                <li> <a data-toggle="tab" class="btnradio" href="#sent_requests"> Sent Requests  ({{ $sent_requests->count()}})</a></li>
                <li> <a data-toggle="tab" class="btnradio" href="#received_requests"> Received Requests ({{ $recieve_requests->count() }})</a></li>
                <li> <a data-toggle="tab" class="btnradio" href="#connections"> Connections ({{ $accepted_requests->count()}})</a></li>
              </ul>
            
              <div class="tab-content">
                <div id="suggestions" class="tab-pane fade in active" >
                  <table class="table" id="content_wrapper">
                      @foreach($suggested_users as $user)
                       
                      <tr>
                        <td scope="col">
                         <p style="color:#fff">
                            {{ $user->name }} -  {{ $user->email }}   
                         </p>
                        </td> 
                        <td>
                            <button class="btn btn-primary btn-sm connect" data-id="{{ $user->id }}"> Connect </button>
                        </td>
                      </tr> 
                      @endforeach
                  </table>
                </div>
                <div id="sent_requests" class="tab-pane" >
                  <table class="table">
                      @foreach($sent_requests as $sent_request)
                       
                      <tr>
                        <td scope="col">
                         <p style="color:#fff">
                            {{ $sent_request->requestToUser->name }} -  {{ $sent_request->requestToUser->email }}
                         </p>
                        </td> 
                        <td>
                            <button class="btn btn-danger btn-sm withdraw" data-id="{{ $sent_request->id }}"> Withdraw  Request </button>
                        </td>
                      </tr> 
                      @endforeach
                  </table>
                </div>
                <div id="received_requests" class="tab-pane">
                  <table class="table">
                      @foreach($recieve_requests as $recieve_request)
                       
                      <tr>
                        <td scope="col">
                         <p style="color:#fff">
                            {{ $recieve_request->requestFromUser->name }} -{{ $recieve_request->requestFromUser->email }}
                         </p>
                        </td> 
                        <td>
                            <button class="btn btn-primary btn-sm accept" data-id="{{ $recieve_request->id }}"> Accept </button>
                        </td>
                      </tr> 
                      @endforeach
                  </table>
                </div>
                <div id="connections" class="tab-pane">
                  <table class="table">
                      @foreach($accepted_requests as $accepted_request)
                       
                      <tr>
                        <td scope="col">
                         <p style="color:#fff">
                            @if($accepted_request->requestFromUser->id != Auth::user()->id) 
                              {{ $accepted_request->requestFromUser->name }} -  {{ $accepted_request->requestFromUser->email }}
                              @php
                                  $idCommon = $accepted_request->requestFromUser->id;
                              @endphp
                            @else
                              {{ $accepted_request->requestToUser->name }} -  {{ $accepted_request->requestToUser->email }}
                              @php
                                  $idCommon = $accepted_request->requestToUser->id;
                              @endphp
                            @endif
                         </p>
                        </td> 
                        <td>
                            <button class="btn btn-danger btn-sm connection_remove" data-id="{{ $accepted_request->id }}"> Remove Connection </button>
                            <button class="btn btn-primary btn-sm  " data-auth_id="{{ Auth::user()->id }}" data-common_id="{{ $idCommon }}"> Common Connection (@php print_r(get_common_conntections(Auth::user()->id,$idCommon)) @endphp) </button>
                        </td>
                      </tr> 
                      @endforeach
                  </table>
                </div>
                
                
                 
              </div>

               
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('page_js')
  <script>
      $('.connect').click(function(){
          let id = $(this).data('id');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
                url: "{{ route('mark_suggestions') }}",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(result) {
                    if(result.status == true){
                        alert(result.message);
                        location.reload();
                    }else{
                      alert(result.message);
                    }
                }
          });
      });

      $('.withdraw').click(function(){
          let id = $(this).data('id');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
                url: "{{ route('withdraw_request') }}",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(result) {
                    if(result.status == true){
                        alert(result.message);
                        location.reload();
                    }else{
                      alert(result.message);
                    }
                }
          });
      });
      $('.accept').click(function(){
          let id = $(this).data('id');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
                url: "{{ route('accept_request') }}",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(result) {
                    if(result.status == true){
                        alert(result.message);
                        location.reload();
                    }else{
                      alert(result.message);
                    }
                }
          });
      });
      $('.connection_remove').click(function(){
          let id = $(this).data('id');
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
                url: "{{ route('connection_remove') }}",
                method: "POST",
                data: {
                    id: id,
                },
                success: function(result) {
                    if(result.status == true){
                        alert(result.message);
                        location.reload();
                    }else{
                      alert(result.message);
                    }
                }
          });
      });
      
  </script>

  <script>
      
     function make_skeletion(){
      
      var  outPut = '';
       outPut +=` <table class="table">`;
       for(var count = 0; count < 5; count++){
        outPut +=` <tr>
                    <td scope="col">
                      <p style="color:#fff">
                        ----------
                      </p>
                    </td> 
                    <td>
                       ----------
                    </td>
              </tr>  
        `;
       }
       outPut +=` </table>`;
       return outPut;
       
     }
  </script>

  <script>
       
      $('.common_connection').click(function(){
          var auth_id = $(this).data('auth_id');
          var common_id = $(this).data('common_id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
          $.ajax({
            url: "{{ route('common_connection') }}",
            method: "POST",
            data: {
              auth_id: auth_id,
              common_id: common_id
            },
            success: function(result) {
                if(result.status == true){
                    alert(result.message);
                    location.reload();
                }else{
                  alert(result.message);
                }
            }
        }); 
        
      });
  </script>
@endsection
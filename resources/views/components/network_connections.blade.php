<div class="row justify-content-center mt-5">
  <div class="col-12">
    <div class="card shadow  text-white bg-dark">
      <div class="card-header">Coding Challenge - Network connections</div>
      <div class="card-body">
        <div class="container">
  
          <ul class="nav nav-tabs">
            <li class="active"> <a data-toggle="tab" href="#suggestions">Suggestions (1)</a></li>
            <li> <a data-toggle="tab" class="btnradio" href="#sent_requests"> Sent Requests ()</a></li>
            <li> <a data-toggle="tab" class="btnradio" href="#received_requests"> Received Requests ()</a></li>
            <li> <a data-toggle="tab" class="btnradio" href="#connections"> Connections ()</a></li>
          </ul>
        
          <div class="tab-content">
            <div id="suggestions" class="tab-pane fade in active">
              <table class="table">
                  @foreach($suggestedUsers as $user)
                  <tr>
                    <td scope="col">
                     <p style="color:#fff">
                        {{ $user->name }}
                     </p>
                    </td> 
                    <td>
                        <button class="btn btn-primary btn-sm"> Connect </button>
                    </td>
                  </tr>
                  @endforeach
              </table>
            </div>
            <div id="sent_requests" class="tab-pane fade">
              <h3>Menu 1</h3>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="received_requests" class="tab-pane fade">
              <h3>Menu 2</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="connections" class="tab-pane fade">
              <h3>Menu 3</h3>
              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
          </div>
        </div>
         

  
        
      </div>
    </div>
  </div>
</div>

 

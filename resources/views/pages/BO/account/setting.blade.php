@extends('layouts/back-office')

@section('body')

{{-- FREE ACCOUNT MODAL --}}
<div class="modal fade" id="freeAccountModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">FREE account features (basic)</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia velit veritatis nobis dolorum voluptate, consectetur impedit similique deleniti nisi quaerat dolores facere consequatur placeat accusamus, ut, adipisci temporibus minus nostrum?
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
</div>

{{-- TEAM ACCOUNT MODAL --}}
<div class="modal fade" id="teamAccountModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">TEAM account features</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam a beatae nemo porro reiciendis excepturi itaque culpa alias delectus id quibusdam non ratione et unde modi, odio tempora? Reiciendis, sapiente!
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
</div>

{{-- BUSINESS ACCOUNT MODAL --}}
<div class="modal fade" id="businessAccountModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">BUSINESS account features</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil obcaecati laboriosam facilis ad, deserunt saepe doloremque voluptates enim. Labore repellendus incidunt soluta accusamus molestias. Facilis enim rem vel laboriosam velit.
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
</div>

{{-- UPDATE SETTING MODAL --}}
<div class="modal fade" id="updateAccountModal">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Edit account settings</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <form action="{{ route('accounts.update', ['account' => session('user_hashed_id')]) }}" method="post">
          @method('PUT')
          @csrf
          <input type="text" name="fullname" class="form-control" value="{{ $account->fullname }}" required /> <br>
          <input type="email" name="email" class="form-control" value="{{ $account->email }}" required /> <br>
          <input type="password" name="password" class="form-control" placeholder="Your last password" required /> <br>
          <input type="password" name="new_password" class="form-control" placeholder="Your new password" required /> <br>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm the new password" required /> <br>
          <select name="account_type" class="form-control">
            <option value="{{ $account->account_type }}">
              @if ($account->account_type === 'free_account')
                  <span class="bold text-success">FREE</span>
              @elseif($account->account_type === 'team_account')
                  <span class="bold text-success">TEAM</span>
              @elseif($account->account_type === 'business_account')
                  <span class="bold text-success">BUSINESS</span>
              @else 
                  Unknown
              @endif
            </option>
            <option value="free_account">FREE</option>
            <option value="team_account">TEAM</option>
            <option value="business_account">BUSINESS</option>
          </select> <br>
          <button type="submit" class="btn btn-dark-blue">Save change</button> &nbsp;
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </form>
      </div>

    </div>
  </div>
</div>


<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 p-2">
            <h4 class="text-dark-blue p-2 text-center">What about all account?</h4>
            <button class="btn btn-success w-100 mt-1" type="button" data-toggle="modal" data-target="#freeAccountModal"><i class="ti-check"></i> FREE</button> <br>
            <button class="btn btn-warning w-100 mt-1" type="button" data-toggle="modal" data-target="#teamAccountModal"><i class="ti-user"></i> TEAM</button> <br> 
            <button class="btn btn-dark-blue w-100 mt-1" type="button" data-toggle="modal" data-target="#businessAccountModal"><i class="ti-star"></i> BUSINESS</button> <br>
        </div>
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
            <div class="container text-dark-blue bold border p-1 mt-1 d-flex justify-content-between align-items-center">
                <span class="h5 bold">
                    <i class="ti-panel"></i> &nbsp; Settings
                </span>
                <span>
                  <a data-toggle="modal" data-target="#updateAccountModal" class="btn btn-dark-blue" data-toggle="tooltip" data-placement="bottom" title="Edit account"><i class="ti-pencil-alt"></i></a>
                </span>
            </div>
            <div class="container p-0">
                <table class="table table-bordered">
                    <tr>
                        <th width="200">Fullname: </th> <td>{{ $account->fullname }}</td>
                    </tr>
                    <tr>
                        <th>Email: </th> <td>{{ $account->email }}</td>
                    </tr>
                    <tr>
                        <th>Account type: </th> 
                        <td>
                            @if ($account->account_type === 'free_account')
                                <span class="bold text-success">FREE ACCOUNT</span>
                            @elseif($account->account_type === 'team_account')
                                <span class="bold text-success">TEAM ACCOUNT</span>
                            @elseif($account->account_type === 'business_account')
                                <span class="bold text-success">BUSINESS ACCOUNT</span>
                            @else 
                                Unknown
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Created at: </th> <td>{{ $account->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Last update: </th> <td>{{ $account->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- VUEJS APP --}}
<div id="app">
  <toast v-if=@json(session('success') !== null) title="Success" text="{{session('success')}}" type="success"></toast>
  <toast v-if=@json(session('danger') !== null) title="Danger" text="{{session('danger')}}" type="danger"></toast>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.toast').toast('show');
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
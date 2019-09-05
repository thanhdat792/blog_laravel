@extends('layouts.default')
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Đăng nhập</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#"> Quên mật khẩu?</a></div>
        </div>     
        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>  
            <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">  
                @csrf                           
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" placeholder = "Tên đăng nhập" autocomplete = 'new-password'>                                      
                </div>                              
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder = "Mật khẩu" autocomplete = 'new-password'>
                </div> 
                @error('password')
                    <div style="margin-bottom: 25px" class="input-group alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror 
                <div class="input-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Duy trì đăng nhập
                    </div>
                </div>                                 
                <div style="margin-top:10px" class="form-group">
                    <div class="col-sm-12 controls">
                        <input type="submit" class="btn btn-primary" id="btn-login" value = "Đăng nhập"> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Bạn chưa có tài khoản?
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                Đăng kí tại đây
                            </a>
                        </div>
                    </div>
                </div> 
            </form>       
        </div>                     
    </div>  
</div>

<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">Đăng kí</div>
            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Đăng nhập</a></div>
        </div>  
        <div class="panel-body" >
            <form id="registerform" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">  
                @csrf                             
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder = "Tên đăng nhập">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                                     
                </div> 
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder = "Email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                                  
                </div>                             
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder = "Mật khẩu">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder = "Xác nhận mật khẩu">
                </div>                                       
                <div style="margin-top:10px" class="form-group">
                    <div class="col-sm-12 controls">
                        <input type="submit" class="btn btn-primary" id="btn-login" value = "Đăng ký"> 
                    </div>
                </div>
            </form> 
        </div>
    </div>      
</div>

<script type="text/javascript">
@error('username')
    $('#myModal').modal('show');
@enderror
</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
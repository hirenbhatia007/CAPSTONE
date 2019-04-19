function viewPassword()
{
  var passwordInput = document.getElementById('password-field');
  var passStatus = document.getElementById('pass-status');
 
  if (passwordInput.type == 'password')
  {
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}
    function viewPassword1()
{
  var passwordInput = document.getElementById('password-field1');
  var passStatus = document.getElementById('pass-status1');
 
  if (passwordInput.type == 'password')
  {
    passwordInput.type='text';
    passStatus.className='fa fa-eye-slash';
    
  }
  else{
    passwordInput.type='password';
    passStatus.className='fa fa-eye';
  }
}




toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

$(document).on("click", "#encurtar", function(){
  let longurl = document.getElementById("longurl").value;
  let slug = document.getElementById("slug").innerHTML;
  if (longurl.startsWith("http") === false) {
    toastr.error('Insira uma URL válida!');
    return;
  }
	fetch('/manage.php?action=add&url=' + longurl + '&slug=' + slug).then((resp) => resp.text()).then(function(data) {
    if (data == 'error') {
      toastr.error('O slug inserido já está em uso!');
    } else {
      document.getElementById('shorturl').value = 'imlucas.me/' + data;
      document.getElementById('stats').href = 'https://imlucas.me/-' + data;
      document.getElementById('stats').innerHTML = 'https://imlucas.me/-' + data;
      document.getElementById('qrcode').src = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=https://imlucas.me/' + data;
      document.getElementById("modal").style.display='flex';
    }
	});
});

$(document).on("click", "#closeModal", function(){
  document.getElementById("modal").style.display='none';
});

$(document).on("click", "#login", function(){
  document.getElementById("login").classList.add('is-loading');
  document.getElementById("login-card").classList.remove('error');
  document.getElementById("user").classList.remove('is-danger');
  document.getElementById("pass").classList.remove('is-danger');
	let user = document.getElementById("user").value;
	let pass = document.getElementById("pass").value;
	fetch('/login.php?user=' + user + '&pass=' + pass).then((resp) => resp.text()).then(function(data) {
    if (data == 'true') {
      location.reload();
    } else {
      document.getElementById("login").classList.remove('is-loading');
      document.getElementById("login-card").classList.add('error');
      document.getElementById("user").classList.add('is-danger');
      document.getElementById("pass").classList.add('is-danger');
    }
	});
});
$(document).on("click", "#encurtar", function(){
  var longurl = document.getElementById("longurl").value;
  var slug = document.getElementById("slug").innerHTML;
	fetch('/manage.php?action=add&url=' + longurl + '&slug=' + slug).then((resp) => resp.text()).then(function(data) {
		document.getElementById('shorturl').value = 'imlucas.me/' + data;
		document.getElementById('qrcode').src = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&choe=UTF-8&chl=https://imlucas.me/' + data;
		document.getElementById('stats').href = 'https://imlucas.me/-' + data;
		document.getElementById('stats').innerHTML = 'https://imlucas.me/-' + data;
	});
  document.getElementById("modal").style.display='flex';
});

$(document).on("click", "#closeModal", function(){
  document.getElementById("modal").style.display='none';
});
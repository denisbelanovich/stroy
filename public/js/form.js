$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					Swal.fire({
						icon: json.status,
						title: json.status,
						text: json.message,
						showConfirmButton: false,
						timer: 1700
					}).then((result) => {
						if (result.dismiss === Swal.DismissReason.timer) {
							window.location.href = '/' + json.url;
						}
					})
				} else {
					Swal.fire(json.status, json.message, json.status)
					// alert(json.status + ' - ' + json.message);
				}
			},
		});
	});
});
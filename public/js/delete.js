$(document).ready(function(){
	$('.delete').on('click',function (event) {
	var json;
	event.preventDefault();
		Swal.fire({
			title: 'Вы уверены?',
			text: "Будет удалено безвозвратно!",
			icon: 'warning',
			showCancelButton: true,
			cancelButtonText: 'Нет',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Да, удалить!'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: $(this).attr('href'),
					success: function(result) {
					json = jQuery.parseJSON(result);
					Swal.fire({
						icon: json.status,
						title: json.status,
						text: json.message,
						showConfirmButton: true,
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.href = '/' + json.url;
						}
					})
				}
			})
		}
	});
});
});
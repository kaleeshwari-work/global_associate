	document.getElementById('contactForm').addEventListener('submit', function (e) {
		e.preventDefault(); // Prevent the default form submission

		const formData = new FormData(this);

		fetch('sendmail.php', {
			method: 'POST',
			body: formData
		})
			.then(response => response.json())
			.then(data => {
				if (data.status === 'success') {
					Swal.fire({
						title: 'Success!',
						text: data.message,
						icon: 'success',
						confirmButtonText: 'OK'
					}).then(() => {
						window.location.reload();
					});
				} else {
					Swal.fire({
						title: 'Error!',
						text: data.message,
						icon: 'error',
						confirmButtonText: 'OK'
					});
				}
			})
			.catch(error => {
				Swal.fire({
					title: 'Error!',
					text: 'Something went wrong. Please try again.',
					icon: 'error',
					confirmButtonText: 'OK'
				});
			});
	});

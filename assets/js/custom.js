function isNumberKey(evt) {
	var charCode = (evt.which) ? evt.which : evt.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
	return true;
}

function space(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode == 32) {
		return false
	}
	return true
}

function isAlpha(evt) {
	var inputValue = evt.which;
	// allow letters and whitespaces only.
	if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 &&
			inputValue != 8 && inputValue != 37 && inputValue != 39)) {
		return false
	}
	return true
}

function addCommaNumeric(evt) {
	$(evt.target).val(function (index, value) {
		return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	});
}

function numComma(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
		return false;
	}
	return true;
}

$(".flatpickr").flatpickr({
	dateFormat: "F d, Y",
});
$(".flatpickrDT").flatpickr({
	dateFormat: "F d, Y H:i",
	enableTime: true,
	time_24hr: true
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#blah').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$(document).ready(function () {
	$('table.dataTables').each(function () {
		$('#' + $(this).attr('id')).DataTable({
			"language": {
				"emptyTable": '<div class="text-center p-4">' +
					'<img class="mb-3" src="../assets/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
					'<p class="mb-0">No data to display</p>' +
					'</div>'
			},
			"scrollX": true,
			"responsive": true
		});
	});

	//binds to onchange event of your input field
	$('input.imgprev').each(function () {
		$('#' + $(this).attr('id')).bind('change', function () {
			//this.files[0].size gets the size of your file.
			if (this.files[0].size > (1 * 1024 * 1024)) {
				Swal.fire({
					text: 'File size to large, maximum file size is 1 Mb !',
					icon: 'warning',
				})
				this.value = "";
			} else {
				const [file] = this.files
				if (file) {
					imgthumbnail.src = URL.createObjectURL(file)
				}
			}
		})
	});

	$('#tag').tagsInput({
		'width': 'auto',
		'delimiter': ',',
		'defaultText': 'Tag',
		onAddTag: function (item) {
			$($(".tagsinput").get(0)).find(".tag").each(function () {
				if (!ValidateText($(this).text().trim().split(/(\s+)/)[0])) {
					$(this).addClass("badge-primary");
				}
			});
		},
		'onChange': function (item) {
			$($(".tagsinput").get(0)).find(".tag").each(function () {
				if (!ValidateText($(this).text().trim().split(/(\s+)/)[0])) {
					$(this).addClass("badge-primary");
				}
			});
		}

	});
})

function toBase64(file) {
	return new Promise((resolve, reject) => {
		const reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = () => resolve(reader.result);
		reader.onerror = error => reject(error);
	});
}

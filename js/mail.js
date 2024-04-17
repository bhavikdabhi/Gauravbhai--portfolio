
	function send(){
		
		var params ={
			 name : document.getElementById("inputName").value,
			 lname : document.getElementById("inputLName").value,
		 	 email : document.getElementById("inputEmail").value,
			subject : document.getElementById("inputSubject").value,
			 message : document.getElementById("inputMessage").value
		}
		emailjs.send("service_ptiym9a","template_bwtb0s7",params).then(function(res){
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer:3000,
				timerProgressBar: true,
				didOpen: (toast) => {
				  toast.onmouseenter = Swal.stopTimer;
				  toast.onmouseleave = Swal.resumeTimer;
				}
			  });
			  Toast.fire({
				icon: "success",
				title: "Mail successfully sent!"
			  });
		})
	}


 
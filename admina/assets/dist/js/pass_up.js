$(document).ready(function(){
  $('textarea.editbox' ).ckeditor();
    $("#pass_up").validate({
 errorClass: 'help-block',
        errorElement: 'span',
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        },
    	 rules : {
                password : {
                    required:true,
               //     remote : "http://localhost/gen_back/admina/modul/change_password/check_pass.php",
 /*                   remote: {
           url: "http://localhost/gen_back/admina/modul/change_password/check_pass.php" ,
           type: "post" ,
           data: {
              password: function() {
                 return $("#password").val();
           }
         }
     }*/
                },
                 password_baru : {
                    minlength : 3,
                    required:true
                },
                password_confirm : {
                    minlength : 3,
                    required:true,
                    equalTo : "#password_baru"
                }
               },
                  messages:
             {
                 password:
                 {
                    required: "Masukan Password lama anda",
                    remote: jQuery.validator.format("{0} tidak sama"),
                 },
                 password_baru: {
                 	required:"Masukan lagi password baru anda",
                 	minlength:"Minimal 3 Karakter",
                 },
                 password_confirm: {
                 	required:"Masukan lagi password baru anda",
                 	minlength:"Minimal 3 Karakter",
                 	equalTo:"Password baru harus sama"
                 } 
             },
             
            submitHandler: function(form) {
               $('#loadnya').show();
                   $(form).ajaxSubmit({
                          type: "post",
                          url: $(this).attr('action'),
                          data: $(this).serialize(),
                       //  enctype:  'multipart/form-data'
                        success: function(data){
                          $('#loadnya').hide();
                              if (data=='false') { 
                         $('.pass_salah').fadeIn();
                                //$('.sukses').html(data);
                              } else {
                              	$('.notif_top_up').fadeIn(1000);
                              	 setTimeout(function () {
                                 window.location.href = "./"; //will redirect to your blog page (an ex: blog.html)
                              }, 2000); //will call the function after 2 secs.
                              	//redirect jika berhasil login
                              }
                      }
                    });
            }

        });  


       $("#pass_reset").validate({
 errorClass: 'help-block',
        errorElement: 'span',
        highlight: function(element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
        },
       rules : {
                 password_baru : {
                    minlength : 3,
                    required:true
                },
                password_confirm : {
                    minlength : 3,
                    required:true,
                    equalTo : "#password_baru"
                }
               },
                  messages:
             {
                 password_baru: {
                  required:"Masukan password baru",
                  minlength:"Minimal 3 Karakter",
                 },
                 password_confirm: {
                  required:"Masukan lagi password baru",
                  minlength:"Minimal 3 Karakter",
                  equalTo:"Password baru harus sama"
                 } 
             },
             
            submitHandler: function(form) {
               $('#loadnya').show();
                   $(form).ajaxSubmit({
                          type: "post",
                          url: $(this).attr('action'),
                          data: $(this).serialize(),
                       //  enctype:  'multipart/form-data'
                        success: function(data){
                          $('#loadnya').hide();
                              if (data=='false') { 
                         $('.pass_salah').fadeIn();
                                //$('.sukses').html(data);
                              } else {
                                $('.notif_top_up').fadeIn(1000);
                                 setTimeout(function () {
                                 window.location = $("#redirect").val(); //will redirect to your blog page (an ex: blog.html)
                              }, 2000); //will call the function after 2 secs.
                                //redirect jika berhasil login
                              }
                      }
                    });
            }

        });  

	})
$(document).ready(function(){

		$(".seePass").mousedown(function(){

	Save = $("#txtPassword").val();

	$("#txtPassword").replaceWith('<input class="m-wrap" id="txtVisible" type="text" value="'+ Save +'" placeholder="Your Password"/>');
	

});

$(".seePass").mouseup(function(){

	Save = $("#txtVisible").val();
	
	$("#txtVisible").replaceWith('<input class="m-wrap" id="txtPassword" type="password" value="'+ Save +'"  placeholder="Your Password"/>');

});

$(".seePass").mouseout(function(){

	$(this).mouseup();

});

    $("#form").validate({
            rules: {
                username: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
                  password: {           //input name: fullName
                    required: true,   //required boolean: true/false   
                },
            },
            submitHandler: function(form) {
               $('.load').show();
                $('.m-input-prepend').hide();
                   $(form).ajaxSubmit({
                          type:"post",
                          url: $(this).attr('action'),
                          data: $(this).serialize(),
                        success: function(data){
                        
                          $('.load').hide();
                              if (data) { 
                                //redirect jika berhasil login
                                window.location="./index.php/";
                              } else {
                                 $('.bad').fadeIn();
                              }
                      }
                    });
            }

        });  
		//kembali ke login
	$("#back").click(function(event) {
	     $('.bad').hide();
	     $('.m-input-prepend').show();
		});

  $.backstretch([
      "assets/login/img/1.jpg"
    , "assets/login/img/2.jpg"
    , "assets/login/img/03.jpg"
  ], {duration: 3000, fade: 1000});
	})
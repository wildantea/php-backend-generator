$(function(){

   $(".table").on('click','.hapus',function(event) {

    event.preventDefault();
    var currentBtn = $(this);

		uri = currentBtn.attr('data-uri');
		id = currentBtn.attr('data-id');


    $('#ucing')
        .modal({ keyboard: false })
        .one('click', '#delete', function (e) {

                $.ajax({
			    type: "POST",
			    url: uri+"?act=delete&id="+id,
			    success: function(data){

			        $("#line_"+id).fadeOut("slow");
			    }
			    });
          $('#ucing').modal('hide');

        });



  });

$('body').on('click', '.hapus_foto', function(event) {

    event.preventDefault();
    var currentBtn = $(this);

    uri = currentBtn.attr('data-uri');
    id = currentBtn.attr('data-id');

    $('#ucing')
        .modal({ keyboard: false })
        .one('click', '#delete', function (e) {

                $.ajax({
          type: "POST",
          url: uri+"?act=hapus_foto&id="+id,
          success: function(data){
            console.log(data);


              $("#foto_"+id).remove();
          }
          });
          $('#ucing').modal('hide');
          //location.reload();
        });



  });

$('body').on('click', '.hapus_album', function(event) {

    event.preventDefault();
    var currentBtn = $(this);

    uri = currentBtn.attr('data-uri');
    gallery_uri = currentBtn.attr('data-gallery');
    id = currentBtn.attr('data-id');

    $('#ucing')
        .modal({ keyboard: false })
        .one('click', '#delete', function (e) {

                $.ajax({
          type: "POST",
          url: uri+"?act=hapus_album&id="+id,
          success: function(data){
            console.log(data);
          }
          });
          $('#ucing').modal('hide');
         window.location=gallery_uri;
        });



  });


});

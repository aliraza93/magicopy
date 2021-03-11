success = '<div class="alert alert-success">Content Updated Successfully</div>';
error = '<div class="alert alert-danger">Something Went Wrong</div>';

 $("#main_content").unbind('submit').bind('submit', function() {
    $("#main-submit-button").hide();
    $('.plz_wait').fadeIn();
    $url = "manage-page";
    var form = $(this);
    var url = form.attr('action');
    var type = form.attr('method');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: url,
        type: type,
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
       success: function (data) {
        $("#main-submit-button").fadeIn();
        if(data.response){
            $('#main_content').find('h5').after().html(success);
        }
        else{
          $('#main_content').find('h5').after().html(error);
         
        }
      }
    });
    return false;
});

//content 1 

$("#content-1").unbind('submit').bind('submit', function() {
    $("#main-submit-button").hide();
    $('.plz_wait').fadeIn();
    var form = $(this);
    var url = form.attr('action');
    var type = form.attr('method');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: url,
        type: type,
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
      success: function (data) {
        if(data.response){
            $('#content-1').find('h5').after().html(success);
        }
        else{
          $("#content1_submit").fadeIn();
          $('#content-1').find('h5').after().html(error);
         
        }
      }
    });
    return false;
});

//

//content 2 

  $("#content-2").unbind('submit').bind('submit', function() {
    $("#main-submit-button").hide();
    $('.plz_wait').fadeIn();
    $url = "manage-page";
    var form = $(this);
    var url = form.attr('action');
    var type = form.attr('method');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: url,
        type: type,
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        success: function (data) {
            if(data.response){
                $('#content-2').find('h5').after().html(success);
            }
            else{
            $("#content2_submit").fadeIn();
            $('#content-2').find('h5').after().html(error);
            
            }
        }
    });
    return false;
});

// content 3

    $("#content3").unbind('submit').bind('submit', function() {
        $("#main-submit-button").hide();
        $('.plz_wait').fadeIn();
        $url = "manage-page";
        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: url,
            type: type,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            success: function (data) {
            if(data.response){
                $('#content3').find('h5').after().html(success);
            }
            else{
            $("#content3_submit").fadeIn();
            $('#content3').find('h5').after().html(error);
            
            }
        }
    });
    return false;
});

// content 4
    $("#content_4").unbind('submit').bind('submit', function() {
        $("#content4_submit").hide();
        $('.plz_wait').fadeIn();
        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: url,
            type: type,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            async: false,
           success: function (data) {
                if(data.response){
                    $('#content_4').find('h5').after().html(success);
                }
                else{
                $("#content4_submit").fadeIn();
                $('#content_4').find('h5').after().html(error);
                
                }
           }
    });
    return false;
});


// content 5

    $("#content5").unbind('submit').bind('submit', function() {
        $("#content5-submit").hide();
        $('.plz_wait').fadeIn();
        var form = $(this);
        var url = form.attr('action');
        var type = form.attr('method');
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: url,
            type: type,
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            success: function (data) {
                $("#content5-submit").fadeIn();
                if(data.response){
                    $('#content5').find('h5').after().html(success);
                }
                else{
                    
                    $('#content5').find('h5').after().html(error);
                
                }
            }
        });
       return false;
   });


// content 6
$(document).on('click','#content6-submit',function(e){
    $("#content6-submit").hide();
    // $('.plz_wait').fadeIn();
    $url = "manage-page";
    $.ajax({
      url: $url,
      type: "POST",
      dataType: 'json',
      data: $('#content6').serializeArray(),
      success: function (data) {
            $("#content6-submit").fadeIn(); 
            if(data.response){
                $('#content6').find('h5').after().html(success);
            }
            else{
           
            $('#content6').find('h5').after().html(error);
            
            }
        }
    });
});

// content 7
$(document).on('click','#content7_submit',function(e){
    $("#content7_submit").hide();
    // $('.plz_wait').fadeIn();
    $url = "manage-page";
    $.ajax({
      url: $url,
      type: "POST",
      dataType: 'json',
      data: $('#content7').serializeArray(),
      success: function (data) {
        $("#content7_submit").fadeIn();
            if(data.response){
                $('#content7').find('h5').after().html(success);
            }
            else{
           
            $('#content7').find('h5').after().html(error);
            
            }
        }
    });
});

// content 8 

// content 5

$("#content_8").unbind('submit').bind('submit', function() {
    $("#content8-submit").hide();
    $('.plz_wait').fadeIn();
    var form = $(this);
    var url = form.attr('action');
    var type = form.attr('method');
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: url,
        type: type,
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        async: false,
        success: function (data) {
            $("#content8-submit").fadeIn();
            if(data.response){
                $('#content_8').find('h5').after().html(success);
            }
            else{
                $('#content_8').find('h5').after().html(error);
            
            }
        }
    });
   return false;
});
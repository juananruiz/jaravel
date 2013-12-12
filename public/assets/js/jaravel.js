//-------------------------------------------------------------------------------- 
//
//  Modals Window Handler 
//
//-------------------------------------------------------------------------------- 
function modals_handler()
{
	//Modals Window Handler 
    $('body').on('click','a[data-toggle="modal"]',function(e){
        var action = $(this).attr('data-href');
        $.ajax({
            url : action,
            type: "GET",
    
            success: function(response) {
                $('#modal').html(response);
                $('#modal').modal('show');
            },

            error: function (xhr, ajaxOptions, thrownError) {
             console.log(xhr.status);
             console.log(thrownError);
             notification ('Error', thrownError, 'error', true);
            }
        });
        e.preventDefault();
    });
}


//--------------------------------------------------------------------------------
//
// Ajax href handler 
//
//--------------------------------------------------------------------------------
function ajax_handler()
{
    $('body').on('click','a[data-toggle="ajax"]',function(e){
        var action = $(this).attr('href');
        var div = $(this).attr('data-div');
        var undef;
        
        if(div == undef)
            div = 'content';

        var refresh = false;
        if(div == 'content' || div == 'subcontent')
            refresh = true;

        ldAjax(action,div,refresh);
        e.preventDefault();
    });
}


//--------------------------------------------------------------------------------
//
// Load Server response from url into div (replace content)
//
//--------------------------------------------------------------------------------
function ldAjax (url, div, refresh) 
{
    $.ajax(
    {
        type: "GET",
        url: url,
        dataType: "html",
        
        beforeSend : function (data) {
            $('#'+div).addClass("loading");
        },

        success: function(data) 
        {
            $('#'+div).removeClass("loading");
            $('#'+div).html(data);
            //Update URL bar if div is content
            if( refresh === true )
            {
                var reg = /.+?\:\/\/.+?(\/.+?)(?:#|\?|$)/;
                if ( !reg.exec(url) )
                {
                    var pathname = "/";
                }
                else
                {
                    var pathname = reg.exec(url)[1];
                }
                var stateObj = { foo: "bar" };
                history.pushState(stateObj, "page 2", pathname);

                //Check notification & trophy alerts
                //checkNotifications(false);

                //App.init(); // Init layout and core plugins
                Plugins.init(); // Init all plugins
                FormComponents.init(); // Init all form-specific plugins
            }
        },                    

        error: function (xhr, ajaxOptions, thrownError) {
         $('#'+div).removeClass("loading");
         console.log(xhr.status);
         console.log(thrownError);
         notification ('Error', thrownError, 'error', true);
        }
    });    
}

//--------------------------------------------------------------------------------
//
// Ajax Form handler
//
//--------------------------------------------------------------------------------
function formHandler(form)
{
  $.ajax(
  {
    method: form.attr("method"),
    url: form.attr("action"),
    data: form.serialize(),

    success: function(){
      $('#modal').modal('close');
    },

    error: function (xhr, ajaxOptions, thrownError) {
      console.log(xhr.status);
      console.log(thrownError);
      notification ('Error', thrownError, 'error', true);
    }
  });
}



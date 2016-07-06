
$(document).ready(function(){

    $('#myTable').DataTable({
            });
    $("#checkAll").change(function () {
        $("input:checkbox").prop('checked', $(this).prop("checked"));
    });
    
    $.ajaxSetup({
        headers:{
            'X-CSRF-Token':$('meta[name="_token"]').attr('content')
        }
    })

    $('#getGoogleContacts').on('click', function (){
        // $.get('social/auth/redirect/google');
        $.ajax({
            type:"GET",
            async: false,
            url:"social/auth/redirect/google",
            succes:function(data)
            {
                alert("Yes");
            },
            error:function(data)
            {
                alert(data.error);
            }
        });

     });


     $(".addRow").on('click', function(e) {

        e.preventDefault();
        var rowId = $(this).attr('id');
        var counter=rowId.split(/[-]/);
        var guestName = $('#name'+counter[1]).html();
        var guestEmail = $('#email'+counter[1]).html();
        var guestPhone = $('#phone'+counter[1]).html();
        
        $.ajax({
            type:"POST",
            url:"addContact",
            data:{
                guestName: guestName,
                guestEmail: guestEmail,
                guestPhone: guestPhone
            },
            success:function(data)
            {
                if(data.message)
                {
                    showAlert("ooops!!", data.message, "error");
                }
                else
                {    
                    $('#row'+counter[1]).remove();
                    showAlert("Yippe!!", "Guest Added", "success");
                }    
            },
            error:function(data)
            {
                
            }
        });
    })

    $("#addSelected").on('click', function(e) {

        e.preventDefault();
        var totalChecked = $( "input[name='googleContacts']:checked").map(function (index, el) 
        {
            return $(el).attr('id').split(/[-]/)[1] 
      }).get();
        console.log(totalChecked);
         var i;
         var contacts = new Array();
         for(i=0; i<totalChecked.length; i++)
         {
             contacts[i] = {
                            "guestName" : $('#name'+totalChecked[i]).html() 
                            , "guestEmail": $('#email'+totalChecked[i]).html()
                            , "guestPhone" : $('#phone'+totalChecked[i]).html()
                             };
            console.log(contacts[i]);
        
         }

         console.log(contacts);

         $.ajax({
            type:"POST",
            url:"addMultipleGoogleContacts",
            data:{
                contacts: contacts
            },
            success:function(data)
            {
                if(data.message)
                {
                    showAlert("ooops!!", data.message, "error");
                }
                else
                {    
                    //$('#row'+counter[1]).remove();
                    showAlert("Yippe!!", "Guest Added", "success");
                }    
            },
            error:function(data)
            {
                
            }
        });
         
    });


    });

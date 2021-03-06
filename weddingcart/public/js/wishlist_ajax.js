  
    $(document).ready(function(){

      var values = $('.hiddenproductId').map(function (index, el) {
       return $(el).attr('id'); 
      }).get();                 // get the value of all div having this id 
      var contributionvalues = $('.progressbar').map(function (index, el) {
       return $(el).attr('id'); 
      }).get(); 

      
      var totaldiv = values.length;
      var i;
      for(i=0;i<totaldiv;i++)
      {
        var hiddenProductId=values[i];
        var progressBarId=contributionvalues[i];
        if($("#"+hiddenProductId).html()!=0)
        {
          var splitId=values[i].split(/[_]/);
          var getOnlyIdNumber=splitId[2];
          var a = $("#btn-editwishlist-"+getOnlyIdNumber);
          $("#btn-editwishlist-"+getOnlyIdNumber).css("display","inherit");
          $("#btn-removewishlist-"+getOnlyIdNumber).css("display","inherit");
          $("#btn-addwishlist-"+getOnlyIdNumber).css("display","none");
          $("#btn-updatewishlist"+getOnlyIdNumber).css("display","none");
          $("#btn-canceltoupdatewishlist"+getOnlyIdNumber).css("display","none");
          $('#productName'+getOnlyIdNumber).attr("disabled", "disabled");
          $('#productDescription'+getOnlyIdNumber).attr("disabled", "disabled");
          $('#productPrice'+getOnlyIdNumber).attr("disabled", "disabled");
          $('#message'+getOnlyIdNumber).attr("disabled", "disabled");
          
        }
        if($("#"+progressBarId).attr('data-to')>0)
        {
          var splitProgressBarId=contributionvalues[i].split(/[_]/);
          var lastindex=splitProgressBarId[1];
          $("#btn-removewishlist-"+lastindex).attr("disabled","disabled");
          
        }
        }

        
      
      $('#posts').on('click', '.btn-addtowishlist', function(event){

        var id = $(this).attr('id');
        var idfields=id.split(/[-]/);
        var counter=idfields[2];
        // alert(counter);
       $.ajaxSetup({
          headers:{
            'X-CSRF-Token':$('meta[name="_token"]').attr('content')
          }
        })
        var changedImage=$("#productImage"+counter).val();
        var productName=$("#productName"+counter).val();
        var productImage=$("#imgsrc"+counter).val();
        var productDescription=$("#productDescription"+counter).val();
        var productPrice=$("#productPrice"+counter).val();
        var message=$("#message"+counter).val();
        
        // alert(productName);


        $.ajax({
          type:"POST",
          url:"/ajaxwishlist",
          data:{
              productName:productName,
              productImage:productImage,
              productDescription:productDescription,
              productPrice:productPrice,
              message:message,
              changedImage:changedImage

              
            },
          
          success:function(data){

          /*  alert(data);
            var result=data;
            var productid=result['1'];
            if(result['0']==1)*/


            //var result=data;
            var productid=data.id;
            if(data.status==1)

            {
              
              //alert("Added To Wishlist");
              showAlert(data.title, data.message, data.level);
              $("#product_id_"+counter).html(productid);
              $("#btn-editwishlist-"+counter).css("display","inherit");
              $("#btn-removewishlist-"+counter).css("display","inherit");
              //$("#remove_"+counter).css("display","none");
              $("#btn-addwishlist-"+counter).css("display","none");
              $('#productName'+counter).attr("disabled", "disabled");
              $('#productDescription'+counter).attr("disabled", "disabled");
              $('#productPrice'+counter).attr("disabled", "disabled");
              $('#message'+counter).attr("disabled", "disabled");
              
               //$(".btn-addtowishlist").replaceWith( $( ".btn-editwishlist" ) );



            }
          },
          error:function(data)
          {
            alert(data);
          }
        })
      })

      $('#posts').on('click', '.btn-removewishlist', function(event){

        var id = $(this).attr('id');
        var idfields=id.split(/[-]/);
        var counter=idfields[2];
        // alert(counter);
        if($("#product_id_"+counter).html()!=0)
        {

       $.ajaxSetup({
          headers:{
            'X-CSRF-Token':$('meta[name="_token"]').attr('content')
          }
        })
        var productid=$("#product_id_"+counter).html();

        $.ajax({
          type:"POST",
          url:"/deletewishlist",
          data:{
              productid:productid
            },
          
          success:function(data){
            //var result=data;
            if(data.status==1)
            {
              //alert("Product Removed Succesfully");
                showAlert(data.title, data.message, data.level);
              $("#product_id_"+counter).html("NULL");
              $("#btn-editwishlist-"+counter).css("display","none");
              $("#btn-deletewishlist-"+counter).css("display","none");
              $("#btn-addwishlist-"+counter).css("display","inherit");
              $("#btn-updatewishlist-"+counter).css("display","none");
              $('#productName'+counter).removeAttr("disabled");
              $('#productDescription'+counter).removeAttr("disabled");
              $('#productPrice'+counter).removeAttr("disabled");
              $('#message'+counter).removeAttr("disabled");
              $('#formdiv'+counter).hide(1000, function () {
              $(this).remove();
              });
            }
            if(result==0)
            {
              alert("Some Error Ocured");
            }
          },
          error:function(data)
          {
            alert(data);
          }
        })
      }
      else
      {
        $("#formdiv"+counter).hide(1000, function(){
          $(this).remove();
        })
      }
      })

      $('#posts').on('click', '.btn-editwishlist', function(event){

        var id = $(this).attr('id');
        var idfields=id.split(/[-]/);
        var counter=idfields[2];
        
              $("#btn-editwishlist-"+counter).css("display","none");
              $("#btn-removewishlist-"+counter).css("display","inherit");
              $("#btn-addwishlist-"+counter).css("display","none");
              $("#btn-updatewishlist-"+counter).css("display","inherit");
              $("#btn-canceltoupdatewishlist-"+counter).css("display","inherit");
              $('#productName'+counter).removeAttr("disabled");
              $('#productDescription'+counter).removeAttr("disabled");
              $('#productPrice'+counter).removeAttr("disabled");
              $('#message'+counter).removeAttr("disabled");
            
      })

      $('#posts').on('click', '.btn-canceltoupdatewishlist', function(event){

              var id = $(this).attr('id');
              var idfields=id.split(/[-]/);
              var counter=idfields[2];
              var productId = $('#product_id_'+counter).html();
              $.ajaxSetup({
                  headers:{
                      'X-CSRF-Token':$('meta[name="_token"]').attr('content')
                          }
                        })
              var productid=$("#product_id_"+counter).html();

              $.ajax({
                type:"POST",
                url:"/cancelwishlist",
                data:{
                    productId:productId
                     },
              success:function(data)
              {
                
                $('#productName'+counter).val(data.product_name);
                $('#productDescription'+counter).val(data.product_description);
                $('#productPrice'+counter).val(data.product_price);
                $('#message'+counter).val(data.message);
                $('#productName'+counter).attr("disabled", "disabled");
                $('#productDescription'+counter).attr("disabled", "disabled");
                $('#productPrice'+counter).attr("disabled", "disabled");
                $('#message'+counter).attr("disabled", "disabled");
                $("#btn-editwishlist-"+counter).css("display","inherit");
                $("#btn-removewishlist-"+counter).css("display","inherit");
                $("#btn-addwishlist-"+counter).css("display","none");
                $("#btn-updatewishlist-"+counter).css("display","none");
                $("#btn-canceltoupdatewishlist-"+counter).css("display","none");
                $('#productName'+counter).attr("disabled", "disabled");
                $('#productDescription'+counter).attr("disabled", "disabled");
                $('#productPrice'+counter).attr("disabled", "disabled");
                $('#message'+counter).attr("disabled", "disabled");
              },
              error:function(data)
              {
                alert(data);
              }
            })
              
              
            
      })

      $('#posts').on('click', '.btn-updatewishlist', function(event){

        var id = $(this).attr('id');
        var idfields=id.split(/[-]/);
        var counter=idfields[2];
        
       $.ajaxSetup({
          headers:{
            'X-CSRF-Token':$('meta[name="_token"]').attr('content')
          }
        })
        
        var productid=$("#product_id_"+counter).html();
        var productName=$("#productName"+counter).val();
        var productImage=$("#imgsrc"+counter).val();
        var productDescription=$("#productDescription"+counter).val();
        var productPrice=$("#productPrice"+counter).val();
        var message=$("#message"+counter).val();
        $.ajax({
          type:"POST",
          url:"/updatewishlist",
          data:{
              productid:productid,
              productName:productName,
              productImage:productImage,
              productDescription:productDescription,
              productPrice:productPrice,
              message:message,
            },
          
          success:function(data){
            //var result=data;
            if(data.status==1)
            {
              //alert("Product Updated Succesfully");
                showAlert(data.title, data.message, data.level);

              $("#btn-editwishlist-"+counter).css("display","inherit");
              $("#btn-removewishlist-"+counter).css("display","inherit");
              $("#btn-addwishlist-"+counter).css("display","none");
              $("#btn-updatewishlist-"+counter).css("display","none");
              $("#btn-canceltoupdatewishlist-"+counter).css("display","none");
              $('#productName'+counter).attr("disabled", "disabled");
              $('#productDescription'+counter).attr("disabled", "disabled");
              $('#productPrice'+counter).attr("disabled", "disabled");
              $('#message'+counter).attr("disabled", "disabled");
            }
            if(result==0)
            {
              alert("Some Error Ocured");
            }
          },
          error:function(data)
          {
            alert(data);
          }
        })
      })


    })
    
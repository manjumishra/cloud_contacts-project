 @extends('dashboard')
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <title>Document</title>
 </head>

 <body>
     @section('con')
     <div class="container text-center bg-dark col-5 mt-5"><br>
      <div class="container">
         <h4 class="text-success "> Share Your Contact</h4>
         <div class="container mt-3">
             <input type="text" class="url_link " id="sharelink"  value="{{$url}}">
             <button class="copybtn" ><i class="far fa-clipboard "></i></button>
         </div>
     </div>
      <div class="mt-3">
          <a href="" id="ShareWithWhatsapp" ><i class="fab fa-whatsapp icons ml-2 bg-success" style="font-size:40px;"></i></a>
        </div><br>
     </div>
     @endsection


     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script>
         let copiedlink="";
        //  let user="admin@123gmail.com";
         function copyToClipboard(element,btnelm)
         {
             let $temp=$('<input>');
             $("body").append($temp);
             $temp.val($(element).val()).select();
             document.execCommand('copy');
             $temp.remove();
             $(btnelm).html('<i class="fa fa-link"></i>');
             setTimeout(()=>{
                $(btnelm).html('<i class="far fa-clipboard"></i>');
             },2000)
        
         }

       $(document).ready(function(){
             $copiedlink=$('#sharelink').val();


            $('#ShareWithWhatsapp').click(function(){
                window.open('https://api.whatsapp.com/send?text='+ $copiedlink,'_blank')
            })

            
            // $('#ShareWithMail').click(function(){
            //     let format="Hello i am working as a developer:"+($copiedlink);
            //     let mail="mailto:?subject="+$user+"want to work with you&body="+ encodeURIComponent(format);
            //     window.location.href=mai;
            // })
            

            $(document).on('click','.copybtn',function(){
                copyToClipboard($(this).parent().parent().find('input'),$(this));
            })
       })
     </script>
 </body>

 </html>
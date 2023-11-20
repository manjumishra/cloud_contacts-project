 @extends('dashboard')
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <title>Document</title>
 </head>

 <body>
     @section('con')

     <div class="container">
         <div class="container table-light">

             <div class="row">
                 <h2 class="col-8 mt-4 fa fa-address-book font-weight-bold text-danger " style="font-size: 40px;">
                     Your Contact</h2>
                     <a href="/showcontact" class="btn btn-success container col-2 mt-4">
                    <i class=" fa fa-backword font-weight-bold text-light mt-4"></i>Back
                </a>
            </div>
            <br>
            @if(Session::has('error'))
            <div class="alert alert-danger font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
            </div>
            @endif
             <br>
             <div class="ml-4 row">
             <button class="btn btn-secondary col-1" onclick="download('contact.csv')">CSV</button>
             </div>
             <table class="table mt-4">
                 <tr>
                     <th>S.no</th>
                     <th>Firstname</th>
                     <th>Lastname</th>
                     <th>Email</th>
                     <th>Contact No</th>
                     <th>Address</th>
                     <th>Nickname</th>
                     <th>Company</th>
                     <th>Status</th>
                     <th>Action</th>
                 </tr>
                 @php
                 $sn=1;
                 @endphp
                 @foreach($sel as $sel1)
                 <tr>
                     <td>{{$sn++}}</td>
                     <td>{{$sel1->firstname}}</td>
                     <td>{{$sel1->lastname}}</td>
                     <td>{{$sel1->email}}</td>
                     <td>{{$sel1->phonenumber}}</td>
                     <td>{{$sel1->address}}</td>
                     <td>{{$sel1->nickname}}</td>
                     <td>{{$sel1->company}}</td>

                     @if($sel1->status=='inactive')
                     <td class="text-danger font-weight-bold">Inactive</td>
                     @else
                     <td class="text-success font-weight-bold">Active</td>
                     @endif

                     <td>
                         <!-- <a href="/delcontact/{{$sel1->id}}" class="fa fa-trash"style="font-size:30px;"></a> -->
                         <button type="button" class="text-seccess" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-trash"></i>
                        </button> 
                         <a href="/share/{{$sel1->id}}" class="fa fa-share-alt text-dark " style="font-size:30px;"></a>

                     </td>
                 </tr>
                   
                 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body bg-light" align=center>
                                        <h4><i class=" fa fa-exclamation-circle"></i></h4>
                                        <h6>Are you sure you want ot delete !!??</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger col-3" data-dismiss="modal">No</button>
                                        <a href="/delcontact/{{$sel1->id}}" class="btn btn-success col-3">
                                            Yes</a>
                                   
                 @endforeach
             </table>
             <br>

  

         </div>
     </div>
     @endsection
     <script>
         function download(filename) {
             var csv = [];
             var rows = document.querySelectorAll("table tr");

             //merge the whole data in tabular form   
             for (var i = 0; i < rows.length; i++) {
                 var row = [],
                     cols = rows[i].querySelectorAll("td, th");
                 for (var j = 0; j < cols.length; j++)
                     row.push(cols[j].innerText);
                 csv.push(row.join(","));
             }
             //call the function to download the CSV file  
             downloadCSV(csv.join("\n"), filename);
         }

         function downloadCSV(csv, filename) {
             var csvFile;
             var downloadLink;

             //define the file type to text/csv  
             csvFile = new Blob([csv], {
                 type: 'text/csv'
             });
             downloadLink = document.createElement("a");
             downloadLink.download = filename;
             downloadLink.href = window.URL.createObjectURL(csvFile);
             downloadLink.style.display = "none";

             document.body.appendChild(downloadLink);
             downloadLink.click();
         }
     </script>
 </body>

 </html>
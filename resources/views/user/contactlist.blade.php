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
                 <h2 class="col-8 mt-4 fa fa-address-book font-weight-bold text-success " style="font-size: 40px;">
                     Your Contacts</h2>
             </div>
             <br>
             <div class="ml-4 row">
                 <button class="btn btn-secondary col-1" onclick="download('contact.csv')">CSV</button>
                 <form action="" class="ml-5">
                     <input type="search" class="col-3 ml-5 " placeholder="search here" name="search">
                     <button class="btn btn-success col-2">Search</button>
                 </form>
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
                 @forelse($sel as $q)
                 <tr>
                     <td>{{$sn++}}</td>
                     <td>{{$q->firstname}}</td>
                     <td>{{$q->lastname}}</td>
                     <td>{{$q->email}}</td>
                     <td>{{$q->phonenumber}}</td>
                     <td>{{$q->address}}</td>
                     <td>{{$q->nickname}}</td>
                     <td>{{$q->company}}</td>

                     @if($q->status=='inactive')
                     <td class="text-danger font-weight-bold">Inactive</td>
                     @else
                     <td class="text-success font-weight-bold">Active</td>
                     @endif

                     <td>

                         <a href="/editcontact/{{$q->id}}" class="fa fa-edit text-success " style="font-size:30px;"></a>
                         <!-- <a href="/delcontact/{{$q->id}}" class="fa fa-trash"style="font-size:30px;"></a> -->
                         <a href="/sharebyid/{{$q->id}}"><i class="fa fa-eye text-primary " style="font-size:30px;"></i></a>

                     </td>
                 </tr>
                 <tr>
                 @empty
                <td></td><td></td><td></td><td></td>
                <td>No result found</td>
                 </tr>
                 @endforelse

             </table>
             <br>

             <div class="d-flex justify-content-center">
                 {!! $sel->links() !!}
             </div>

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
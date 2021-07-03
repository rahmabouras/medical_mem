 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        
    </head>
    <body>
        
       
            
              <table style="width:100%">
         

    <thead>
     <br> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    <tr> 
      <th scope="col">id </th>
      <th name="col"> date du rendez-vous</th>
      <th scope="col"> heure du rendez-vous </th>
      <th scope="col"> cause  </th>

    </tr>
    </thead>

    <tbody>
      @foreach($rdv as $row) 
      <tr>
        <th scope="row">{{$row->id}} </th>
        <td>{{$row->date}} </td> <!--row -> nom du fonction du model ->champs choisit -->

        <td>{{$row->heure}} </td>
        <td>{{$row->cause}} </td>

        <td><a href="{{route('rendezvous.edit',$row->id )}}"> <button type="button " class="btn btn-dark"> EDIT </button> </a>
         <td>  

         	<form action="{{route('rendezvous.destroy', $row->id)}}" method="post">
         		@method('DELETE')

         	    @csrf 
               <button type="submit" class="btn btn-dark"> DELETE </button> 

            </form> 







         	
          
         </td>


         







         	
          
        
      </tr>



      @endforeach


    </tbody>
          
           
</table>

         
       

        
    </body>
</html>
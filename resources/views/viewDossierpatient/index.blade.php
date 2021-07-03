   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <table class="table">
         

    <thead class="thread-dark">
      <br> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

       <a href= "{{route('patient.create')}}" > <button type ="button" class="btn btn-outline-success"> CREATE </button>  </a> 
    
    <tr> 
      <th scope="col">Id </th>
      <th scope="col"> Nom patient </th>
      <th scope="col"> Prenom patient  </th>
      <th scope="col"> Adress patient  </th>
      <th scope="col"> Cin  </th>
      <th scope="col"> Email </th>
      <th scope="col"> Sexe </th>
      <th scope="col"> Numero telephone </th>
      <th scope="col"> Assurance </th>
      <th scope="col"> Description </th>
      <th scope="col"> Action </th>

      

    </tr>
    </thead>

    <tbody>
      @foreach ($dossierpatient as $row )
      <tr>
        <th scope="row"> {{$row->id}}</th>
        <td>{{$row->nom_patient}}</td>
        <td>{{$row->prenom_patient}}</td>
        <td>{{$row->adress_patient}}</td>
        <td>{{$row->cin}}</td>
        <td>{{$row->email}}</td>
        <td>{{$row->sexe}}</td>
        <td>{{$row->numtel_patient}}</td>
        <td>{{$row->situation_assurance}}</td>
        <td>{{$row->description_generale}}</td>
        
          <td> <form action="{{route('patient.destroy',$row->id)}}" method="post">
            @method('DELETE')
            @csrf 


<button type="submit" class="btn btn-danger"> DELETE </button>
        
         

        
       




         </form>  </td> </tr>
         

         @endforeach






</tbody>
          
           
</table>

<!doctype>
<html> 
<head > 
	<meta charset="utf-8"> 
	<title> 
</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 </head>
<body>
	<form method="POST" action="{{route('patient.store')}}" >
		@method('PUT')
		@csrf

		     <div> 
			 	<label for="name" > Cause du rendez-vous </label>
			 	<input type="text" class="form-control" value="" name="causerdv" placeholder="Entrez la cause du rendez-vous" > </div> <br>

			 <div class="form-group">	 	
			 	<label for="nom">Entrez le nom dont le personel appartient </label>

             <select   class ="form-control" name="nom" multiple>
             	@foreach($pats as $pat)
               <option value="{{$pat->id}}"> {{$pat->nom_patient}}</option>
               @endforeach
             </select>	 	
			 	<br> <br>	
			 	<div class="form-group">	 	
			 	<label for="prenom">Entrez le prenom dont le personel appartient </label>

             <select   class ="form-control" name="prenom" multiple>
             	@foreach($pats as $pat)
               <option value="{{$pat->id}}"> {{$pat->prenom_patient}}</option>
               @endforeach
             </select>	 	
			 	<br> <br>
		   
		
		<div> 
			 	<label for="name" > Heure du rendez-vous </label>
			 	<input type="time" class="form-control" value=""  name="heurerdv" placeholder="entrez l'heure du rendez-vous" > </div> <br>

		        <label for="name">Date  du rendez-vous </label>
		        <input type="date" class="form-control" value="" name="daterdv"
		        placeholder="Entrez la cause du rendez-vous">  <br>

			<button  type="submit" class="btn btn-danger" class="ajouter" > Créer le rendez-vous </button>
		</form>


 </body>


</html>

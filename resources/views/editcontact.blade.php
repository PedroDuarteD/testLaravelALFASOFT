

<form action=" url( 'editContact', ['id => $contact['id'] ] )" method="POST">
   @csrf
    <div>
    <label>Name</label>
     <input type="text" value="{{$contact['name']}}" name="edit_name">
    </div>
    
    
     <div>
    <label>Email</label>
     <input type="email" value="{{$contact['email']}}" name="email">
    </div>
    
    
     <div>
    <label>Number</label>
     <input type="number" value="{{$contact['number']}}" name="number">
    </div>
    
    <button type="submit">Salvar</button>
    </form>
    
     @if($errors->any())
     <h2> Errors
         </h2>
         
         @foreach($errors->all() as $erro)
          <h5>  {{$erro}} </h5>
         @endforeach
    @endif

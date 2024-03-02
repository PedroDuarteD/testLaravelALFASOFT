

<form action="postContact" method="POST">
   @csrf
    <div>
    <label>Name</label>
     <input type="text" name="edit_name">
    </div>
    
    
     <div>
    <label>Email</label>
     <input type="email" name="edit_email">
    </div>
    
    
     <div>
    <label>Number</label>
     <input type="number" name="edit_number">
    </div>
    
    <button type="submit">Salvar</button>
    </form>
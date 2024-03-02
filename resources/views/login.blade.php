

<form action="loginAuth" method="POST">
   @csrf
    
    
    
     <div>
    <label>Email</label>
     <input type="email"  name="email">
    </div>
    
    
     <div>
    <label>Password</label>
     <input type="text" name="password">
    </div>
    
    <button type="submit">Login</button>
    </form>
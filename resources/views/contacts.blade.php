contacts

<a href="addcontact">Add Contact</a>

@foreach($allcontacts as $contact)
<div style="border: 1px solid black; border-radius: 10px; padding: 10px">
<div>Name: {{$contact["name"]}}</div>

<div>Email: {{$contact["email"]}}</div>

<div>Number: {{$contact["number"]}}</div>

<a href="{{ url('/editContactForm/'.$contact['id'] ) }}">Edit</a>

<form action="{{ url('deleteContact', ['id' => $contact['id'] ])}}" method="delete">
    @csrf
<button type="submit">Eliminar</button>
</form>
</div>
@endforeach


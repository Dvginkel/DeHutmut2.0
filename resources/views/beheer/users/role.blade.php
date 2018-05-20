
<form>
     <label for="sel1">Gebruiker Rol:</label>
    <select class="form-control" id="sel1">
        <option>Gebruiker Rol</option>
        <option>-----------------------------</option>
        @foreach($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }} - {{ $role->description }} </option>
        @endforeach
    </select>

</form>

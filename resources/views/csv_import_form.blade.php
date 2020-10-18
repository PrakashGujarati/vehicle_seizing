

<form action="{{route('csv.import.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="file" name="csv_file">
  <label>
    <select name="table_name">
      <option value="users">Users</option>
      <option value="temp">Temp</option>
    </select>
  </label>
  <br><br>
  <br>
  <input type="submit" value="Submit">
</form>

{{ @$success }}
{{ $errors }}

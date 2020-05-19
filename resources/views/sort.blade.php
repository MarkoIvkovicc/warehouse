   <div class="select">
        <select name="column" style="width: 150px">
            @foreach($columnNames as $data)
                <option value="{{ $data }}">{{ ucfirst($data) }}</option>
            @endforeach
        </select>
    </div>

    <input type="radio" name="sort" value="asc" checked>ASC
    <input type="radio" name="sort" value="desc">DESC

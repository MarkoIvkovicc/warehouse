<h1>Search Filter</h1>

<div class="field">
    <div class="control">
        <label class="label" for="warehouse">Warehouse</label>
        <div class="select">
            <select name="warehouse" id="warehouse">
                <option selected disabled>Choose a Warehouse</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="numInput">
            <label class="label" for="ageMin">Age Between</label>
            <input class="input" name="ageMin" type="number" placeholder="min: 18" value="{{ !empty($oldValues['ageMin']) ? $oldValues['ageMin'] : '' }}">
            <input class="input" name="ageMax" type="number" placeholder="max: 65" value="{{ !empty($oldValues['ageMax']) ? $oldValues['ageMax'] : '' }}">
        </div>
    </div>
</div>

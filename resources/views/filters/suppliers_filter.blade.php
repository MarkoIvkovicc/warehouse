<h1>Search Filter</h1>

<div class="field">
    <div class="control">
        <label class="label" for="city">City</label>
        <input class="input" name="city" type="text" value="{{ !empty($oldValues['city']) ? $oldValues['city'] : '' }}">

        <label class="label" for="phone">Phone</label>
        <input class="input" name="phone" type="text" value="{{ !empty($oldValues['phone']) ? $oldValues['phone'] : '' }}">
    </div>
</div>

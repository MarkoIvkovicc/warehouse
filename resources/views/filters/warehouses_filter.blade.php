<h1>Search Filter</h1>

<div class="field">
    <div class="control">
        <label class="label" for="product">Product</label>
        <input class="input" name="product" type="text" value="{{ !empty($oldValues['product']) ? $oldValues['product'] : '' }}">

        <label class="label" for="city">City</label>
        <input class="input" name="city" type="text" value="{{ !empty($oldValues['city']) ? $oldValues['city'] : '' }}">

        <label class="label" for="stock">Min Stock</label>
        <input class="input" name="stock" type="number" value="{{ !empty($oldValues['stock']) ? $oldValues['stock'] : '' }}">
    </div>
</div>

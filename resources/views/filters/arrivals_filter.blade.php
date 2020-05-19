<h1 class="title">Search Filter</h1>

<div class="field">
    <div class="control">
        <div class="dropdowns">
            <label for="supplier" class="label">Supplier
                <div class="select">
                    <select name="supplier" id="supplier">
                        <option selected disabled>Choose a Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
            <label for="employee" class="label">Employee
                <div class="select">
                    <select name="employee" id="employee">
                        <option selected disabled>Choose a Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
            <label for="product" class="label">Product
                <div class="select">
                    <select name="product" id="product">
                        <option selected disabled>Choose a Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
            <label class="label" for="warehouse">Warehouse
                <div class="select">
                    <select name="warehouse" id="warehouse">
                        <option selected disabled>Choose a Warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                </div>
            </label>
        </div>
        <div class="numInputRow">
            <div class="numInput">
                <label for="arrivalDateMax" class="label">Arrival Date Between</label>
                <input type="date" class="input" name="arrivalDateMin" value="{{ !empty($oldValues['arrivalDateMin']) ? $oldValues['arrivalDateMin'] : '' }}">
                <input type="date" class="input" name="arrivalDateMax" value="{{ !empty($oldValues['arrivalDateMax']) ? $oldValues['arrivalDateMax'] : '' }}">
            </div>

            <div class="numInput">
                <label for="arrivalStockMin" class="label">Arrival Stock Between</label>
                <input type="number" class="input" name="arrivalStockMin" placeholder="Min value" value="{{ !empty($oldValues['arrivalStockMin']) ? $oldValues['arrivalStockMin'] : '' }}">
                <input type="number" class="input" name="arrivalStockMax" placeholder="Max value" value="{{ !empty($oldValues['arrivalStockMax']) ? $oldValues['arrivalStockMax'] : '' }}">
            </div>

            <div class="numInput">
                <label for="expire_date" class="label">Expire Days</label>
                <input type="number" class="input" name="expireDays" placeholder="Days before expire date" value="{{ !empty($oldValues['expireDays']) ? $oldValues['expireDays'] : '' }}">
            </div>
        </div>

    </div>
</div>

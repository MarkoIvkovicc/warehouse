<div class="search">
    @if (isset($columnNames))
        <form action="{{ Request::path() }}" method="get" style="margin-top: 5px;">

            {{--    @if (file_exists('filters/' . Request::path() . '_filter.blade.php'))      The path doesn't work... method returns false  --}}
            @include('filters/' . Request::path() . '_filter')
            <br>
            {{--    @endif--}}


            @include('sort')
            <br><br>

            <input type="text" class="input is-hovered is-rounded" name="search" placeholder="Search..." style="width: 240px;" value="{{ !empty($oldValues['search']) ? $oldValues['search'] : '' }}">
            <button type="submit" class="button is-dark is-rounded">Search</button>
        </form>
    @endif
</div>

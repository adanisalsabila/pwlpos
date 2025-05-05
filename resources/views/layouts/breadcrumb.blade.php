<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $breadcrumb->title ?? ' ' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if (isset($breadcrumb->list) && is_array($breadcrumb->list) && count($breadcrumb->list) > 0)
                        {{-- Home Breadcrumb --}}
                        <li class="breadcrumb-item">
                            <a href="{{ route('Welcome') }}">Home</a>
                        </li>

                        {{-- Loop through the breadcrumb items --}}
                        @foreach ($breadcrumb->list as $key => $value)
                            @php
                                $url = url($value);  //{{-- Construct URL from the value --}}
                            @endphp

                            {{-- Check if it's the last breadcrumb item (current page) --}}
                            @if ($key == count($breadcrumb->list) - 1)
                                <li class="breadcrumb-item active">{{ $value }}</li>
                            {{-- For other breadcrumb items, create a link --}}
                            @else
                                <li class="breadcrumb-item">
                                    <a href="{{ $url }}">{{ $value }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>

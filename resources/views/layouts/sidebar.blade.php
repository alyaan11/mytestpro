
@php
    $menuitems = [
        ['name' => 'Profile', 'route' => route('profile.edit')],
        ['name' => 'Accessories', 'route' => route('accessories.index')],
    ]
@endphp

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width: 230px;">
        <h3 class="text-start mb-4">
            <a href="{{ route('home') }}" style="color: inherit; text-decoration: none;">{{ __('Dashboard') }}</a>
        </h3>
        <ul class="nav flex-column">

            @can('viewAny', App\Models\product::class)
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link text-white">
                        {{ __('Products') }}
                    </a>
                </li>
            @endcan

            {{-- @can('create', App\Models\product::class) --}}
                <li class="nav-item">
                    <a href="{{ route('products.create') }}" class="nav-link text-white">
                        {{ __('Create Product') }}
                    </a>
                </li>
            {{-- @endcan --}}

            @foreach ($menuitems as $item)
                <li class="nav-item">
                    <a href="{{ $item['route'] }}" class="nav-link text-white">
                        {{ __($item['name']) }}
                    </a>
                </li>
            @endforeach

            @can('viewAny', App\Models\Category::class)
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link text-white">
                        {{ __('Categories') }}
                    </a>
                </li>
            @endcan

            @can('manage-roles')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link text-white">
                        {{ __('Roles & Permissions') }}
                    </a>
                </li>
            @endcan


            @can('viewAny', App\Models\User::class)
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link text-white">
                        {{ __('Users') }}
                    </a>
                </li>
            @endcan

            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn text-white">{{ __('logout') }}</button>
                </form>
            </li>
                <li class="nav-item">
                    <a href="{{ route('products.test') }}" class="nav-link text-white">
                        {{ __('Test') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('welcome') }}" class="nav-link text-white">
                        {{ __('Welcome Page') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('lang') }}" class="nav-link text-white">
                        {{ __('Languages') }}
                    </a>
                </li>
        </ul>
    </div>


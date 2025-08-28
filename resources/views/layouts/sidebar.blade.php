
@php
    $menuitems = [
        ['name' => 'Products' , 'route' => route('products.index')],
        ['name' => 'Create Product', 'route' => route('products.create')],
        ['name' => 'Profile', 'route' => route('profile.edit')],
        ['name' => 'Users', 'route' => route('users.index')],
        ['name' => 'Roles', 'route' => route('roles.index')],
        ['name' => 'Accessories', 'route' => route('accessories.index')],
    ]
@endphp

<div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3 vh-100" style="width: 230px;">
        <h3 class="text-start mb-4">Dashboard</h3>
        <ul class="nav flex-column">
            @foreach ($menuitems as $item)
                <li class="nav-item">
                    <a href="{{ $item['route'] }}" class="nav-link text-white">
                        {{ $item['name'] }}
                    </a>
                </li>
            @endforeach

            @can('viewAny', App\Models\Category::class)
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link text-white">
                        Categories
                    </a>
                </li>
            @endcan

            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn text-white">Logout</button>
                </form>
            </li>
        </ul>

    </div>


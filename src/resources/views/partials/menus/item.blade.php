@can('view', \:namespace_vendor\:namespace_skeleton_name\Models\:skeleton_name::class)
    <li class="nav-item">
        <a class="nav-link {{ (Str::startsWith(request()->route()->getName(), 'admix.:skeleton_name_plural_lower')) ? 'active' : '' }}"
           href="{{ route('admix.:skeleton_name_plural_lower.index') }}"
           aria-expanded="{{ (Str::startsWith(request()->route()->getName(), 'admix.:skeleton_name_plural_lower')) ? 'true' : 'false' }}">
        <span class="nav-icon">
            <i class="icon {{ config(':package_name.icon') }}"></i>
        </span>
            <span class="nav-text">
            {{ config(':package_name.name') }}
        </span>
        </a>
    </li>
@endcan

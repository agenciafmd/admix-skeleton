@can('view', '\:namespace_vendor\:namespace_skeleton_name\:skeleton_name')
    <li class="nav-item">
        <a class="nav-link {{ (admix_is_active(route('admix.:skeleton_name_plural_lower.index'))) ? 'active' : '' }}"
           href="{{ route('admix.:skeleton_name_plural_lower.index') }}"
           aria-expanded="{{ (admix_is_active(route('admix.:skeleton_name_plural_lower.index'))) ? 'true' : 'false' }}">
        <span class="nav-icon">
            <i class="icon {{ config(':package_name.icon') }}"></i>
        </span>
            <span class="nav-text">
            {{ config(':package_name.name') }}
        </span>
        </a>
    </li>
@endcan

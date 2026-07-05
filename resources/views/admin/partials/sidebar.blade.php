<div class="sidebar">
    <ul>
        <li>
            <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">
                <i class='bx bx-grid-alt'></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/programAdmin" class="{{ request()->is('programAdmin*') ? 'active' : '' }}">
                <i class='bx bx-book-open'></i> Program
            </a>
        </li>
        <li>
            <a href="/timAdmin" class="{{ request()->is('timAdmin*') ? 'active' : '' }}">
                <i class='bx bx-group'></i> Tim
            </a>
        </li>
        <li>
            <a href="/pendaftaranAdmin" class="{{ request()->is('pendaftaranAdmin*') ? 'active' : '' }}">
                <i class='bx bx-user-plus'></i> Pendaftaran
            </a>
        </li>
        <li>
            <a href="/pengaturan" class="{{ request()->is('pengaturan') ? 'active' : '' }}">
                <i class='bx bx-cog'></i> Pengaturan
            </a>
        </li>
    </ul>
</div>
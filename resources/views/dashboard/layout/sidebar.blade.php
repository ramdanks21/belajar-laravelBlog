<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light">Hospital ST</div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ $title == 'About' ? 'active' : '' }}"
            href="/dashboard">About</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ $title == 'Slide' ? 'active' : '' }}"
            href="/dashboard/slide">Slide</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ $title == 'Kategori' ? 'active' : '' }}"
            href="/dashboard/category">Kategori</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3 {{ $title == 'Article' ? 'active' : '' }}"
            href="/dashboard/artikel/create">Article</a>

    </div>
</div>

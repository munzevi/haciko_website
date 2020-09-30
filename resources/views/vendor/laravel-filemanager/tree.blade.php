<div class="m-3 d-flex d-lg-none" style="align-items:center;">
    <i class="nc-icon nc-box mr-2"></i> <h5>{{Config::get('cms.app.name')}} File Manager</h5>
</div>

<ul class="nav nav-pills flex-column">
  @foreach($root_folders as $root_folder)
    <li class="nav-item">
      <a class="nav-links" href="#" data-type="0" data-path="{{ $root_folder->url }}">
        <i class="fa fa-folder fa-fw mr-2"></i> {{ $root_folder->name }}
      </a>
    </li>
    @foreach($root_folder->children as $directory)
    <li class="nav-item sub-item" style="display: flex;justify-content: stretch">
      <a class="nav-links" href="#" data-type="0" data-path="{{ $directory->url }}" >
        <i class="fa fa-folder fa-fw mr-2"></i><span> {{ $directory->name }}</span>
      </a>
    </li>
    @endforeach
  @endforeach
</ul>

<h3>Leto {{date("Y")}}</h3>
<div class="skavt-gallery">
  @foreach($imagesByYear as $image)
    {{-- <img src="../../{{$image}}" width="100px" height="100px" alt="" /> --}}
    <a href="{{$image}}" data-lightbox="image-1" data-title="skavt-post">
      <img class="skavt-post-image" src="{{$image}}">
    </a>
  @endforeach
</div>
<hr/>

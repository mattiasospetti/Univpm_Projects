@php
if (empty($imgFile)) {
$imgFile = 'defaultcat.jpg';
}
if (null !== $attrs) {
$attrs = 'class="' . $attrs . '"';
}

@endphp
<img style="   height: 100px;  width: 100px; border-radius: 50%; "src="{{ asset('/css/images/' . $imgFile) }}" {!! $attrs !!}>

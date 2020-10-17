<!-- Button trigger modal -->
<button type="button" class="btn btn-danger w-100" data-toggle="modal" data-target="#delete_track-{{$track->id}}">
    Delete
</button>

<!--I Used Delete Track Modal at the bottom of track.blade.php because there are issues if i put it here
    because in the documentation of modal the say " Nested modals aren’t supported as we believe them to be poor user experiences."
    -->

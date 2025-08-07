<div class="flash-error">
    <b>There are errors in the submission:</b>
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
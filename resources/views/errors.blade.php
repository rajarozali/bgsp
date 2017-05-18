<div class="col-md-12">
    <br>
    @if(isset($errors))
        @if($errors->all())
            <ul style="list-style: none;" class="alert alert-warning">
                @foreach($errors->all() as $content)
                    <li>{{$content}}</li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
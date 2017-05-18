<div class="col-md-12">
    @if(isset($flag)&&$flag==1)
        <br>
        <ul style="list-style: none;" class="alert alert-warning">
            <li>Username and password invalid</li>
        </ul>
    @endif
    @if(isset($flag)&&$flag==3)
        <br>
        <ul style="list-style: none;" class="alert alert-success">
            <li>Record added successful</li>
        </ul>
    @endif
     @if(isset($flag)&&$flag==4)
            <br>
            <ul style="list-style: none;" class="alert alert-success">
                <li>Record edited successful</li>
            </ul>
     @endif
        @if(isset($flag)&&$flag==5)
            <br>
            <ul style="list-style: none;" class="alert alert-success">
                <li>Record delete successful</li>
            </ul>
        @endif
        @if(isset($flag)&&$flag==6)
            <br>
            <ul style="list-style: none;" class="alert alert-warning">
                <li>You don't have permission to this action</li>
            </ul>
        @endif
        @if(isset($flag)&&$flag==7)
            <br>
            <ul style="list-style: none;" class="alert alert-warning">
                <li>You can not modify this record</li>
            </ul>
        @endif
</div>

@section('ajax')
<script type="text/javascript">
    function ajaxPost( action, serialize, async ) {
        //console.log(serialize);
        var _token = jQuery('meta[name="_token"]').attr('content');
        $.ajax({
            data: serialize+'&_token='+_token,
            url: '{{config('app.url')}}/ajax/post/' + action,
            cache: false,
            type: 'POST',
            async: async,
            success: function (data) {
                console.log(data);
                //alert(data);
                return data;
            }
        });
    }

    function ajaxRequest( action, serialize ) {
        //console.log(serialize);
        var _token = jQuery('meta[name="_token"]').attr('content');
        var request = $.ajax({
            data: serialize+'&_token='+_token,
            url: '{{config('app.url')}}' + action,
            cache: false,
            type: 'POST',
            dataType: 'json'
        });
        return request;
    }
</script>
@endsection
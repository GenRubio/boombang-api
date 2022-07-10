@php
    $fa = ($entry->{$column['name']}) ? 'la-check' : 'la-times';
    $text = ($entry->{$column['name']}) ? trans('backpack::crud.yes') : trans('backpack::crud.no');
    $btn_class = ($text == trans('backpack::crud.yes')) ? 'btn-info' : 'btn-danger';
@endphp
<td>
    <a onclick="togglePublish(this)" style="min-width: 49px; color:#ffffff;"
       class="btn btn-xs {{$btn_class}} ladda-button" data-model="{{get_class($entry)}}" data-target="{{$entry->id}}"
       data-field="{{$column['name']}}" data-style="zoom-in"><span class="ladda-label"><i class="la {{$fa}}"></i> {{$text}} </span></a>
</td>

<script type="text/javascript">
    function togglePublish(ev) {
        var model = $(ev).data('model');
        var id = $(ev).data('target');
        var field = $(ev).data('field');

        $.ajax({
            type: 'POST',
            url: "{{route('toggleField')}}",
            data: {model: model, id: id, field: field},

            success: function (result) {
                $(ev).toggleClass('btn-info');
                $(ev).toggleClass('btn-danger');
                $(ev).find('.ladda-label').html(result);
            }
        });
    }
</script>
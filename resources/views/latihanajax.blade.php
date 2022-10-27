<div>
    <label> Part Name</label>
    <select class="form-control" name="id_masterdata" id="id_masterdata">
        <option value="" hidden>--Pilih Barang--</option>
        @foreach ($part as $d)
            <option value="{{ $d->id }}">{{ $d->part_name }}
            </option>
        @endforeach
    </select>
</div>


<label for="">No Part</label>
<input type="text" id="no_part" class="no_part">
<label for="">Katalis</label>
<input type="text" id="katalis" class="no_part">
<label for="">channel</label>
<input type="text" id="channel" class="no_part">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '#id_masterdata', function() {
            var id_masterdata = $(this).val();
            var a = $(this).parent();
            $.ajax({
                type: 'get',
                url: '{{ route('cariPart') }}',
                data: {
                    'id': id_masterdata
                },
                success: function(data) {
                    console.log(id_masterdata);
                    $('#no_part').val(data.no_part);
                    $('#katalis').val(data.katalis);
                    $('#channel').val(data.channel);
                },
                error: function() {

                }
            });
        });
    });
</script>

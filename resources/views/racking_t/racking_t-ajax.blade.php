@foreach ($ajax_racking as $r)
    <div class="row">
        <input type="hidden" id="no_part" name="no_part" value="{{ $r->no_part }}" class="form-control typeahead"
            readonly>
        <input type="hidden" id="part_name" name="part_name" value="{{ $r->part_name }}" class="typeahead form-control"
            placeholder="Masukkan Nama Part" readonly>

        <div class="col-md-6">
            <div class="form-group">
                <label>Part Number</label>
                <input type="text" id="no_part" name="no_part" readonly value="{{ $r->no_part }}"
                    class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label> Katalis </label>
            <input type="text" id="katalis" name="katalis" readonly value="{{ $r->katalis }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label> Channel </label>
            <input type="text" id="channel" name="channel" readonly value="{{ $r->channel }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Chrome </label>
            <input type="text" id="grade_color" name="grade_color" readonly value="{{ $r->grade_color }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <Label> Qty Bar</Label>
            <input type="text" id="qty_bar" name="qty_bar" value="{{ $r->qty_bar }}"
                class="form-control">
        </div>
    </div>
@endforeach

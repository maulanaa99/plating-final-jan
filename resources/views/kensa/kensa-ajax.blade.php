@foreach ($ajax_barang as $d)
    <div class="row">

        <div class="col-md-2">
            <div class="form-group">
                <label>No. Part</label>
                <input type="text" id="no_part" name="no_part" value="{{ $d->no_part }}"
                    class="form-control typeahead" readonly>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label> Part Name</label>
                <input type="text" id="part_name" name="part_name" value="{{ $d->part_name }}"
                    class="typeahead form-control" placeholder="Masukkan Nama Part" readonly>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>No. Bar</label>
                <input type="text" name="no_bar" value="{{ old('no_bar') }}"
                    class="form-control" placeholder="Masukkan No. Bar">
            </div>
        </div>

        

        <div class="col-md-2 col-sm-12">
            <Label> Qty Bar</Label>
            <div class="input-group">
                <input type="text" id="qty_bar" name="qty_bar" value="{{ $d->qty_bar }}" onkeyup="sum();"
                    class="form-control">
                <div class="input-group-prepend">
                    <span class="input-group-text">Pcs </span>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
            <!-- select -->
            <div class="form-group">
                <label>Cycle</label>
                <select name="cycle" class="form-control">
                    <option value="">----Pilih Cycle----</option>
                    <option>Cycle 1</option>
                    <option>Cycle 2</option>
                    <option>Cooper Storage</option>
                    <option>Final Storage</option>
                </select>
            </div>
        </div>
    </div>

    
@endforeach

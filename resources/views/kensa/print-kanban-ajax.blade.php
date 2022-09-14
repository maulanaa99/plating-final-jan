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

        <div class="col-md-2 col-sm-12">
            <label>Stok</label>
            <div class="input-group">
                <input type="text" id="stok" name="stok" value="{{ $d->stok }}"
                    class="form-control" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Pcs </span>
                </div>
            </div>
        </div>

        <div class="col-md-2 col-sm-12">
            <label>Std Qty</label>
            <div class="input-group">
                <input type="text" id="qty_trolly" name="qty_trolly" value="{{ $d->qty_trolly }}"
                    class="form-control" readonly>
                <div class="input-group-prepend">
                    <span class="input-group-text">Pcs </span>
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <label>Next Process</label>
            <input type="text" id="next_process" name="next_process" value="{{ $d->next_process }}"
                class="form-control" readonly>
        </div>

@endforeach



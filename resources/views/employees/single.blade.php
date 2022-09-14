@extends('layouts.appa')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6 offset-md-3">
        <h1>Simple jQuery Autocomplete in Laravel</h1>
        <form> 
            <div class="form-group">
                <label for="no_pegawai">Part Name</label>
                <input type="text" class="form-control" id="part_name" aria-describedby="part_name" placeholder="Enter No. Pegawai">
            </div>
            <div class="form-group">
                <label for="no_part">No.Part</label>
                <input type="text" class="form-control" id="no_part" aria-describedby="no_part" placeholder="Enter No. Pegawai">
            </div>
            
            <div class="form-group">
                <label for="katalis">Katalis</label>
                <input type="text" class="form-control" name="katalis" id="katalis" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="channel">Channel</label>
                <input type="text" class="form-control" name="channel" id="channel" placeholder="Last Name">
            </div>
            <div class="form-group">
                <label for="grade_color">Grade Color</label>
                <input type="grade_color" class="form-control" name="grade_color" id="grade_color" placeholder="grade_color">
            </div>
            <div class="form-group">
                <label for="qty_bar">Qty Bar</label>
                <input type="text" class="form-control" name="qty_bar" id="qty_bar" placeholder="qty_bar">
            </div>
            
            <button class="btn btn-success btn-block">Submit</button>
        </form>
    </div>
</div>
<script src="./js/single.js"></script>
@endsection
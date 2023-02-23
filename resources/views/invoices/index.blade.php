@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="card">
  <div class="card-header">
    <div>
      <h1>Purchase Order</h1>
    </div>
    <div class="text-left">
      <div class="row">
        <div class="col-3">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nonota">No Nota</label>
            <div class="col-sm-9">
              <input 
                id="nonota"
                type="text" 
                class="form-control" 
                disabled
              >
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nonota">Tanggal</label>
            <div class="col-sm-9">
              <input 
                id="nonota"
                type="date" 
                class="form-control"
              >
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nopo">No PO</label>
            <div class="col-sm-9">
              <input 
                id="nopo"
                type="text" 
                class="form-control"
              >
            </div>
          </div>
          
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <select class="form-control">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
                </select>
              </div>
            </div>

            <div class="col-8">
              <input 
                id="nopo"
                type="text" 
                class="form-control"
              >
            </div>
          </div>
        </div>

        <div class="col-5">
          <div class="row">
            <div class="col-6">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Alamat Kirim</label>
                <div class="col-8">
                  <textarea 
                    class="form-control" 
                    rows="3" 
                    placeholder="Enter ...">
                  </textarea>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Remark</label>
                <div class="col-8">
                  <textarea 
                    class="form-control" 
                    rows="3" 
                    placeholder="Enter ...">
                  </textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-tools -->
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="text-right">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
      Tambah barang
    </button>
    </div>
    <table class="table table-bordered table-invoice">
      <thead>
        <tr>
          <th style="width: 120px">Item</th>
          <th>Description</th>
          <th>Satuan</th>
          <th>QTY Pesan</th>
          <th>Unit Price</th>
          <th>Pot [%]</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <div class="text-right row mt-3">
      <div class="col-6"></div>
      <div class="col-6 row">
        <div class="col-6">
          <button class="btn btn-info btn-sm btn-block">
            Cetak
          </button>
        </div>

        <div class="col-6">
          <button class="btn btn-primary btn-sm btn-block">
            Simpan
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td>
                Kode Barang
              </td>

              <td>
                Nama
              </td>

              <td>
                Satuan
              </td>

              <td>
                Harga Beli
              </td>

              <td>
                Stock
              </td>
            </tr>
          </thead>

          <tbody>
            @foreach($invoices as $index => $val)
              <tr id="{{ $val->kode_brg }}">
                <td>
                  {{ $val->kode_brg }}
                </td>

                <td>
                  {{ $val->nama }}
                </td>

                <td>
                  {{ $val->satuan }}
                </td>

                <td>
                  {{ $val->hbeli }}
                </td>

                <td>
                  {{ $val->stock }}
                </td>

                <td>
                  <button
                    type="button"
                    class="add-item btn btn-success btn-sm"
                  >
                    +
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function(){
        $(".add-item").on('click', function () {
          var currentRow = $(this).closest("tr");
          var kode_brg=currentRow.find("td:eq(0)").text()
          var nama=currentRow.find("td:eq(1)").text()
          var satuan=currentRow.find("td:eq(2)").text()
          var hbeli=currentRow.find("td:eq(3)").text()
          var stock=currentRow.find("td:eq(4)").text()
          var markup = "<tr><td>"+ kode_brg +"</td><td>" + nama + "</td><td>" + satuan + "</td><td><input type='number' name='qty_pesan' value='0'></td><td>" + hbeli + "</td><td>" + 0 + "</td><td><input type='number' name='amount' value='0' disabled></td></tr>";
          $(".table-invoice").append(markup);
        })
    });
  </script>
@stop
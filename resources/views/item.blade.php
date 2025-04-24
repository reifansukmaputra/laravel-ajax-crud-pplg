<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Simple CRUD | {{ $title }}</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css"
rel="stylesheet" integrity="sha384-
SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m
7" crossorigin="anonymous">
<link href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"
rel="stylesheet" >
</head>
<body>
<div class="container-fluid">
{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
<a class="navbar-brand" href="#">App</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bstarget="#navbarSupportedContent" aria-controls="navbarSupportedContent" ariaexpanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link" href="{{ url('/') }}">Beranda</a>
</li>
<li class="nav-item">
<a class="nav-link" href="{{ url('/items') }}">Items</a>
</li>
</ul>
<form class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Search" arialabel="Search">
<button class="btn btn-outline-success" type="submit">Search</button>

</form>
</div>
</div>
</nav>
{{-- END NAVBAR --}}
{{-- CONTENT --}}
<div class="container mt-4">
<div class="card">
<div class="card-header">
<h4>Tabel Item</h4>
<button class="btn btn-primary mb-3" id="btnAdd">Tambah Item</button>
</div>
<div class="card-body">
<table class="table table-bordered" id="itemTable">
<thead>
<tr>
<th>No</th>
<th>Item Name</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>
</table>
</div>
</div>
</div>
<!-- Modal -->

<div class="modal fade" id="itemModal" tabindex="-1" arialabelledby="itemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form id="itemForm">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="itemModalLabel">Tambah Item</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Tutup"></button>
    </div>
    <div class="modal-body">
    <input type="hidden" name="id" id="id">
    <div class="mb-3">
    <label for="item_name" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name"
    name="item_name">
    <div class="invalid-feedback" id="item_name_error"></div>
    </div>
    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-select" id="status" name="status">
    <option value="">-- Pilih Status --</option>
    <option value="1">Aktif</option>
    <option value="0">Tidak Aktif</option>
    </select>
    <div class="invalid-feedback" id="status_error"></div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bsdismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary"
    id="saveBtn">Simpan</button>

</div>
</div>
</form>
</div>
</div>
{{-- END CONTENT --}}
</div>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
integrity="sha384-
k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
crossorigin="anonymous"></script>
<script
src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
integrity="sha384-
I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js"
integrity="sha384-
VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+
" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-
/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js" ></script>
<script>
$(document).ready(function() {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}
});
let table = $('#itemTable').DataTable({
ajax: "{{ $url_json }}",
columns: [
{ data: null, render: (data, type, row, meta) => meta.row + 1 },
{ data: 'item_name' },
{ data: 'status', render: status => status == 1 ? 'Aktif' : 'Tidak Aktif' },
{
data: 'id',
render: id => `
<button class="btn btn-warning btn-sm"
onclick="editItem(${id})">Edit</button>
<button class="btn btn-danger btn-sm"
onclick="deleteItem(${id})">Hapus</button>
`
}
]
});
$('#btnAdd').click(function() {
$('#itemForm')[0].reset();
$('#itemModalLabel').text('Tambah Item');
$('#itemForm').find('.is-invalid').removeClass('is-invalid');
$('#itemForm').find('.invalid-feedback').text('');
$('#id').val('');
$('#itemModal').modal('show');
});
$('#itemForm').submit(function(e) {
e.preventDefault();
let id = $('#id').val();

let url = id ? "{{ $url }}/form/" + id : "{{ $url }}/form";
let method = id ? 'PUT' : 'POST';
$.ajax({
url: url,
type: method,
data: $(this).serialize(),
success: function(response) {
$('#itemModal').modal('hide');
table.ajax.reload();
alert(response.message);
},
error: function(xhr) {
let errors = xhr.responseJSON.message;
$('#itemForm').find('.is-invalid').removeClass('is-invalid');
$('#itemForm').find('.invalid-feedback').text('');
if(errors) {
Object.entries(errors).forEach(([key, val]) => {
$('#' + key).addClass('is-invalid');
$('#' + key + '_error').text(val[0]);
});
}
}
});
});
});
function editItem(id) {
$.get("{{ $url }}/" + id, function(res) {
if (res.status) {
$('#itemModalLabel').text('Edit Item');

$('#id').val(res.data.id);
$('#item_name').val(res.data.item_name);
$('#status').val(res.data.status);
$('#itemForm').find('.is-invalid').removeClass('is-invalid');
$('#itemForm').find('.invalid-feedback').text('');
$('#itemModal').modal('show');
}
});
}
function deleteItem(id) {
if(confirm("Yakin ingin menghapus data ini?")) {
$.ajax({
url: "{{ $url }}/form/" + id,
type: 'DELETE',
success: function(response) {
$('#itemTable').DataTable().ajax.reload();
alert(response.message);
}
});
}
}
</script>
</body>
</html>

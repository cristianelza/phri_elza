@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Berita</h1>
        <a href="{{ url('/') }}/dashboard/categories/create" class="btn btn-primary mb-3">Buat Kategori Baru</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <div class="w-100 h-100 p-3">
                <table id="tableCategori" class="display">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori Berita</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr id="index_{{ $category->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <button
                                        class="edit_categories btn btn-warning btn-sm waves-effect waves-light rounded text-white"
                                        data-bs-toggle="modal" data-bs-target="#BtnModalEdit"
                                        data-route="{{ route('dashboard.update_categories', ['id' => $category->id]) }}"
                                        value="{{ $category->id }}" data-toggle="tooltip" data-placement="top"
                                        title="Edit"><i class="fa-solid fa-pen-to-square"></i></button>

                                    <a href="javascript:void(0)" id="btn-delete-category" data-id="{{ $category->id }}"
                                        class="btn btn-danger btn-sm waves-effect waves-light rounded text-white"
                                        data-toggle="tooltip" data-placement="top" title="Hapus"><i
                                            class="fa-solid fa-trash">
                                        </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    <!-- Modal edit kategori -->
    <div class="modal fade" id="BtnModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body" id="editCategoriesForm" action="{{ url('/') }}/dashboard/editCategories"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul id="updateform_errList"></ul>
                    <input type="hidden" id="editCategories">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Kategori <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('edit_name') is-invalid @enderror" id="edit_name"
                            name="edit_name" required autofocus value="{{ old('edit_name') }}">
                        @error('edit_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary update_categories">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#tableCategori').DataTable({
                responsive: true,
                responsive: true,
                scrollY: true,
                paging: false,
                scrollCollapse: true,
                scrollY: '50vh'
            });
            $('[data-toggle="tooltip"]').tooltip();

            $(document).on('click', '.edit_categories', function(e) {
                e.preventDefault();
                var category_id = $(this).val();

                var update_route = $(this).attr('data-route');

                // console.log(category_id);

                $.ajax({
                    type: "GET",
                    url: "/dashboard/edit_categories/" + category_id,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_name').val(response.category.name);
                            $('#editCategoriesForm').attr('action', update_route);
                            $('#BtnModalEdit').modal('show');
                        }
                    }
                });
            });

            $(document).on('submit', '#editCategoriesForm', function(e) {
                e.preventDefault();
                var data = {
                    'name': $('#edit_name').val(),
                }

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 400) {
                            $('#updateform_errList').html("");
                            $('#updateform_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#updateform_errList').append('<li>' + err_values +
                                    '</li>');
                            });
                        } else if (response.status == 404) {
                            $('#updateform_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                        } else {

                            $('#updateform_errList').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);

                            $('#BtnModalEdit').modal('hide');
                            fetchcategory();
                        }
                    }
                });
            });

            $('body').on('click', '[id^=btn-delete-category]', function() {

                let category_id = $(this).data('id');
                let token = $("meta[name='csrf-token']").attr("content");

                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "ingin menghapus data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'TIDAK',
                    confirmButtonText: 'YA, HAPUS!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // console.log('test');

                        //fetch to delete data
                        $.ajax({

                            url: `/dashboard/categories/${category_id}`,
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": token
                            },
                            success: function(response) {
                                if (response.success) {
                                    //show success message
                                    Swal.fire({
                                        type: 'success',
                                        icon: 'success',
                                        title: `${response.message}`,
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                    //remove layanan on table
                                    $(`#index_${category_id}`).remove();
                                } else {
                                    //show error message
                                    Swal.fire({
                                        type: 'success',
                                        icon: 'error',
                                        title: `${response.message}`,
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                }
                            }
                        });
                    }
                });

            });
        });
    </script>
@endsection

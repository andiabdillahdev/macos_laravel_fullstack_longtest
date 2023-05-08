@extends('layouts.layout')
@section('button')
    <button class="btn btn-primary btn-sm " data-kt-drawer-show="true" data-kt-drawer-target="#side_form" id="button-side-form"><i class="fa fa-plus-circle" style="color:#ffffff" aria-hidden="true"></i> Tambah Data Peminjaman</button>
@endsection
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container">
    <div class="row">

     <div class="card">
        <div class="card-body p-0">

        <div class="d-flex justify-content-end mt-5">
            <span class="svg-icon svg-icon-1">
                <svg style="position: relative;left: 34px; top: 10px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                    </g>
                </svg>
            </span>
         
            <input type="text" id="search_" class="form-control form-control-solid w-250px ps-15" placeholder="Search">
        </div>

            <div class="container">
                <div class="py-5">
                    <table id="kt_table_data" class="table table-row-dashed table-row-gray-300 gy-7">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800">
                                <th>No</th>
                                <th>Buku</th>
                                <th>Peminjam</th>
                                <th>Tanggal peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>

    </div>
</div>
<!--end::Container-->
</div>
@endsection
@section('side-form')
<div id="side_form" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true" data-kt-drawer-toggle="#side_form_button" data-kt-drawer-close="#side_form_close" data-kt-drawer-width="500px">
    <!--begin::Card-->
    <div class="card w-100">
        <!--begin::Card header-->
        <div class="card-header pe-5">
            <!--begin::Title-->
            <div class="card-title">
                <!--begin::User-->
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-1 lh-1 title_side_form"></a>
                </div>
                <!--end::User-->
            </div>
            <!--end::Title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-light-primary" id="side_form_close">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body hover-scroll-overlay-y">
           <form class="form-data">
            
                <input type="hidden" name="id">

                <div class="mb-10" id="content-calon">
                    <label class="form-label">Pilih Anggota</label>
                    <select name="id_members" class="form-control form-control-solid member-select" id="member-select" data-control="select2" data-placeholder="Pilih Member">
                    </select>
                    
                    <small class="text-danger id_members_error"></small>
                </div>

                <div class="mb-10" id="content-calon">
                    <label class="form-label">Pilih Buku</label>
                    <select name="book_number" class="form-control form-control-solid books-select" id="books-select" data-control="select2" data-placeholder="Pilih Buku">
                    </select>
                    
                    <small class="text-danger book_number_error"></small>
                </div>


                <div class="mb-10">
                    <label class="form-label">Tanggal peminjaman</label>
                    <input type="date" class="form-control" name="loan_date">
                    <small class="text-danger loan_date_error"></small>
                </div>

                 <div class="mb-10">
                    <label class="form-label">Tanggal pengembalian</label>
                    <input type="date" class="form-control" name="date_of_return">
                    <small class="text-danger loan_date_error"></small>
                </div>
                
              
                <div class="separator separator-dashed mt-8 mb-5"></div>
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-sm btn-submit">Simpan</button>
                        <button type="reset" class="btn mr-2 btn-light btn-cancel btn-sm">Batal</button>
                    </div>
           </form>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>

@endsection
@section('script')
<script>
    let control = new Control();
    $(document).on('click','#button-side-form', function () {
        control.overlay_form('Tambah','Admin');
    })

    $(document).on('submit', ".form-data", function(e){
        e.preventDefault();
        let type = $(this).attr('data-type');
        if (type == 'add') {
            control.submitForm('/borrower/store','Tambah','Buku','POST');
        }else{
            let id = $("input[name='id']").val();
            control.submitForm('/borrower/update/'+id,'Update','Buku', 'PUT');
        }
    });

    $(document).on('click','.button-update', function (e) {
        e.preventDefault();
        let url = '/borrower/show/'+$(this).attr('data-id');
        control.overlay_form('Update','Data Buku', url);
    })

       $(document).on('click','.btn-delete', function (e) {
        e.preventDefault();
        let url = '/borrower/delete/'+$(this).attr('data-id');
        // control.overlay_form('Update','Data Kategori', url);
        let token = $("meta[name='csrf-token']").attr("content");

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
             $.ajax(
        {
            url: url,
            type: 'DELETE',
            data: {
                "id": $(this).attr('data-id'),
                "_token": token,
            },
            success: function (){
                console.log("it Works");
            }
        });

              $("#kt_table_data").DataTable().ajax.reload();
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })

       

    })
    
    $(document).on('keyup', '#search_', function (e) {
        e.preventDefault();
        control.searchTable(this.value);
    })



    $(function () {
        control.push_select2('/books/get-option','.books-select')
        control.push_select2('/members/get-option','.member-select')
        let columns = [
            { 
            data : null, 
                render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },{
                data:'title'
            },{
                data:'members'
            },{
                data:'loan_date'
            },{
                data:'date_of_return'
            },{
                data:'id'
            }
        ];
        let columnDefs = [
            {
                targets: -1,
                title: 'Aksi',
                // width: '15rem',
                orderable: false,
                render: function(data, type, full, meta) {
                    return `
                       <a href="#" data-id="${data}" data-kt-drawer-show="true" data-kt-drawer-target="#side_form" class="btn btn-warning button-update btn-sm">edit</a>
                       <a href="#" data-id="${data}" class="btn btn-delete btn-sm btn-danger">hapus</a>
                        `;
                },
            }
        ];
        control.initDatatable('/borrower/datatable-list',columns,columnDefs);
    })
</script>
@endsection
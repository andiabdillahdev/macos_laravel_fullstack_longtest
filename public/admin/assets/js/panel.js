class Control {
  constructor(type = null) {
    this.type = type;
    this.table = $("#kt_table_data");
    // this.formData = new FormData();
  }

  searchTable(data) {
    this.table.DataTable().search(data).draw();
  }

  overlay_form(type, module, url = null, role = null) {
    $(".title_side_form").html(`${type} ${module}`);
    if (type == "Tambah") {
      $(".form-data")[0].reset();
      $(".form-data").attr("data-type", "add");
    } else {
      $(".form-data").attr("data-type", "update");
      $.ajax({
        url: url,
        method: "GET",
        success: function (res) {
          if (res.success == true) {
            console.log(res);
            $.each(res.data, function (x, y) {
              $("input[name='" + x + "']").val(y);
            });
            // $("select[name='" + x + "']").val(y);
            // $("select[name='" + x + "']").trigger("change");
          }
        },
        error: function (xhr) {
          alert("gagal");
        },
      });
    }
  }

  submitForm(url, role_data = null, module = null, method) {
    let this_ = this;
    let table_ = this.table;

    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

    $.ajax({
      type: method,
      url: url,
      data: $(".form-data").serialize(),
      // data: new FormData($(".form-data")[0]),
      // contentType: false,
      // processData: false,
      success: function (response) {
        console.log(response);
        $(".text-danger").html("");
        if (response.success == true) {
          swal
            .fire({
              text: `${module} berhasil di ${role_data}`,
              icon: "success",
              buttonsStyling: false,
              confirmButtonText: "Ok, got it!",
              confirmButtonColor: "#354C9F",
              customClass: {
                confirmButton: "btn font-weight-bold btn-light-primary",
              },
            })
            .then(function () {
              $("#side_form_close").trigger("click");
              table_.DataTable().ajax.reload();
              $("form")[0].reset();
            });
        } else {
          $("form")[0].reset();
          Swal.fire("Gagal Memproses data!", `${response.message}`, "warning");
        }
      },
      error: function (xhr) {
        $(".text-danger").html("");
        $.each(xhr.responseJSON["errors"], function (key, value) {
          $(`.${key}_error`).html(value);
        });
      },
    });
  }

  push_select2(url, element) {
    $.ajax({
      url: url,
      method: "GET",
      success: function (res) {
        // console.log(res);
        // $(element).empty().trigger("change");
        // $(element).val("").trigger("change");
        $(element).each(function () {
          $(this).select2({ data: res.data });
        });
      },
      error: function (xhr) {
        alert("gagal");
      },
    });
  }

  initDatatable(url, columns, columnDefs) {
    this.table.dataTable().fnDestroy();
    this.table.DataTable({
      responsive: true,
      pageLength: 10,
      order: [[0, "asc"]],
      processing: true,
      ajax: url,
      columns: columns,
      columnDefs: columnDefs,
    });
  }
}

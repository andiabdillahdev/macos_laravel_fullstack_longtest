class Control {
  constructor(type = null) {
    this.type = type;
    this.table = $("#kt_table_data");
    // this.formData = new FormData();
  }

  searchTable(data) {
    this.table.DataTable().search(data).draw();
  }

  modal_content(title, url, url_konsederan) {
    $(".modal-title").html(title);

    $.ajax({
      url: url,
      method: "GET",
      success: function (res) {
        console.log(res);
        let tanggal_perbub = "-";
        let nomor_perbub = "-";
        let row = "";
        $("#konsederan").attr("href", url_konsederan);
        $.each(res.document, function name(x, y) {
          if (y.tanggal_perbub !== null) {
            tanggal_perbub = y.tanggal_perbub;
          }

          if (y.nomor_perbub !== null) {
            nomor_perbub = y.nomor_perbub;
          }

          if (y.verifikator == null) {
            $("#konsederan").css("display", "none");
          } else {
            $("#konsederan").css("display", "block");
          }

          $(".content_detail_1").html(y.nama_documents);

          $(".content_detail_3").html(y.verifikator);
          $(".content_detail_4").html(nomor_perbub);
          $(".content_detail_5").html(tanggal_perbub);

          if (y.status_document == "1") {
            $(".content_detail_2").html(
              '<button class="btn btn-light-danger btn-sm">Belum Verifikasi</button>'
            );
          } else if (y.status_document == "2") {
            $(".content_detail_2").html(
              `<button class="btn btn-light-dark btn-sm">Perbaikan</button>`
            );
          } else if (y.status_document == "3") {
            $(".content_detail_2").html(
              `<button class="btn btn-light-warning btn-sm">Belum Selesai</button>`
            );
          } else {
            $(".content_detail_2").html(
              `<button class="btn btn-light-success btn-sm"> Selesai</button>`
            );
          }
        });

        $.each(res.master_verifikasi, function (i, v) {
          let tindak_lanjut = "-";
          let kesesuaian = "-";
          if (v.tindak_lanjut !== null) {
            tindak_lanjut = v.tindak_lanjut;
          }

          if (v.verifikasi == "1") {
            kesesuaian = `<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_310_17035)">
                        <path d="M17.5098 7.74121H16.2536C15.9804 7.74121 15.7205 7.87246 15.5598 8.09746L11.3491 13.9367L9.44197 11.2903C9.28125 11.068 9.02411 10.9341 8.74822 10.9341H7.49197C7.31786 10.9341 7.21608 11.1323 7.31786 11.2742L10.6554 15.9028C10.7342 16.0129 10.8381 16.1025 10.9586 16.1644C11.079 16.2262 11.2124 16.2585 11.3478 16.2585C11.4831 16.2585 11.6166 16.2262 11.737 16.1644C11.8574 16.1025 11.9613 16.0129 12.0402 15.9028L17.6813 8.08139C17.7857 7.93943 17.6839 7.74121 17.5098 7.74121Z" fill="#50CD89"/>
                        <path d="M12.5 0C5.87321 0 0.5 5.37321 0.5 12C0.5 18.6268 5.87321 24 12.5 24C19.1268 24 24.5 18.6268 24.5 12C24.5 5.37321 19.1268 0 12.5 0ZM12.5 21.9643C6.99821 21.9643 2.53571 17.5018 2.53571 12C2.53571 6.49821 6.99821 2.03571 12.5 2.03571C18.0018 2.03571 22.4643 6.49821 22.4643 12C22.4643 17.5018 18.0018 21.9643 12.5 21.9643Z" fill="#50CD89"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_310_17035">
                        <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                        </clipPath>
                        </defs>
                        </svg>                        
                        `;
          } else {
            kesesuaian = `<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_310_17047)">
                        <path d="M17.1448 7.78948C17.1448 7.67162 17.0483 7.5752 16.9305 7.5752L15.1626 7.58323L12.5001 10.7573L9.84029 7.58591L8.06975 7.57787C7.9519 7.57787 7.85547 7.67162 7.85547 7.79216C7.85547 7.84305 7.87422 7.89127 7.90636 7.93145L11.3912 12.0832L7.90636 16.2323C7.87399 16.2716 7.85604 16.3207 7.85547 16.3716C7.85547 16.4895 7.9519 16.5859 8.06975 16.5859L9.84029 16.5779L12.5001 13.4038L15.1599 16.5752L16.9278 16.5832C17.0456 16.5832 17.1421 16.4895 17.1421 16.3689C17.1421 16.3181 17.1233 16.2698 17.0912 16.2297L13.6117 12.0806L17.0965 7.92877C17.1287 7.89127 17.1448 7.84037 17.1448 7.78948Z" fill="#F1416C"/>
                        <path d="M12.5 0.0268555C5.87321 0.0268555 0.5 5.40007 0.5 12.0269C0.5 18.6536 5.87321 24.0269 12.5 24.0269C19.1268 24.0269 24.5 18.6536 24.5 12.0269C24.5 5.40007 19.1268 0.0268555 12.5 0.0268555ZM12.5 21.9911C6.99821 21.9911 2.53571 17.5286 2.53571 12.0269C2.53571 6.52507 6.99821 2.06257 12.5 2.06257C18.0018 2.06257 22.4643 6.52507 22.4643 12.0269C22.4643 17.5286 18.0018 21.9911 12.5 21.9911Z" fill="#F1416C"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_310_17047">
                        <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                        </clipPath>
                        </defs>
                        </svg>
                        
                        `;
          }
          row += `<tr>
                        <td>${i + 1}</td>
                        <td>${v.master_verifikasi["indikator"]}</td>
                        <td>${kesesuaian}</td>
                        <td>${tindak_lanjut}</td>
                    </tr>`;
        });

        $("#table_detail tbody").html(row);
      },
      error: function (xhr) {
        alert("gagal");
      },
    });
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
            // $("#repeater-dapil").repeater("deleteAll");
            $.each(res.data, function (x, y) {
              // res.data.dapil
              if (x === "dapil") {
                $(".repeater-items").remove();
                $("#kabupaten-select").val(y[0]["kabkot_id"]);
                $("#kabupaten-select").trigger("change");
                setTimeout(function () {
                  $.each(y, function (i, b) {
                    $("#tambah-output-repeater").trigger("click");
                    $(`select[name='repeater-dapil[${i}][dapil]']`)
                      .val(b.id_kecamatan)
                      .trigger("change");
                  });
                }, 1000);
              }

              if (x == "kabupaten") {
                $("#provinsi_select").val(y.provinsi_id);
                $("#provinsi_select").trigger("change");
                setTimeout(function () {
                  $("#kabkot_select").val(y.id);
                  $("#kabkot_select").trigger("change");
                }, 500);
              }

              if (x == "kecamatan") {
                $("#provinsi_select").val(y.kabupaten.provinsi.id);
                $("#provinsi_select").trigger("change");
                setTimeout(function () {
                  $("#kabkot_select").val(y.kabupaten.id);
                  $("#kabkot_select").trigger("change");
                }, 500);

                setTimeout(function () {
                  $("#kecamatan_select").val(y.id);
                  $("#kecamatan_select").trigger("change");
                }, 1000);
              }

              if (x == "kelurahan") {
                $("#provinsi_select").val(y.kecamatan.kabupaten.provinsi.id);
                $("#provinsi_select").trigger("change");
                setTimeout(function () {
                  $("#kabkot_select").val(y.kecamatan.kabupaten.id);
                  $("#kabkot_select").trigger("change");
                }, 100);
                setTimeout(function () {
                  $("#kecamatan_select").val(y.kecamatan.id);
                  $("#kecamatan_select").trigger("change");
                }, 200);
                setTimeout(function () {
                  $("#kelurahan_select").val(y.id);
                  $("#kelurahan_select").trigger("change");
                }, 400);
                // $("#kelurahan_select").val(y.id);
                // $("#kelurahan_select").trigger("change");
              }

              if (x == "id_komunitas") {
                setTimeout(function () {
                  $("#relawan_select").val(y);
                  $("#relawan_select").trigger("change");
                }, 500);
              }

              if (x == "tps") {
                // $("#provinsi_select").val(
                //   y.kelurahan.kecamatan.kabupaten.provinsi.id
                // );
                // $("#provinsi_select").trigger("change");
                // setTimeout(function () {
                //  // setTimeout(function () {

                // }, 400);  $("#kabkot_select").val(y.kelurahan.kecamatan.kabupaten.id);
                //   $("#kabkot_select").trigger("change");
                // }, 100);
                // setTimeout(function () {
                //   $("#kecamatan_select").val(y.kelurahan.kecamatan.id);
                //   $("#kecamatan_select").trigger("change");
                // }, 200);
                // alert(y.id);
                if (typeof y.kelurahan !== "undefined") {
                  $("#kelurahan_select").val(y.kelurahan.id);
                  $("#kelurahan_select").trigger("change");

                  setTimeout(function () {
                    $("#tps_select").val(y.id);
                    $("#tps_select").trigger("change");
                  }, 200);
                }
              }

              if (x == "jenis_kelamin") {
                $("#" + y).prop("checked", true);
              }
              // console.log(x + " | " + y);

              if (x == "deskripsi") {
                $("#content").summernote("code", y);
              }

              if (x !== "swafoto" && x !== "foto_ktp" && x !== "foto") {
                $("input[name='" + x + "']").val(y);
                $("select[name='" + x + "']").val(y);
                $("textarea[name='" + x + "']").val(y);
                $("select[name='" + x + "']").trigger("change");
              }
            });
          }
        },
        error: function (xhr) {
          alert("gagal");
        },
      });
    }
    // this._offcanvasObject.show();
  }

  submitFormMultipart(url, role_data = null, module = null, element, method) {
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

  submitFormMultipartData(
    url,
    role_data = null,
    module = null,
    element,
    method
  ) {
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
      data: new FormData($(".form-data")[0]),
      contentType: false,
      processData: false,
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

  getDataDashboard(type, id = null) {
    $.ajax({
      url: `/get-data-dashboard?type=${type}&id=${id}`,
      type: "GET",
      success: function (res) {
        console.log(res);
        if (res.success == true) {
          $("#suara h1").html(res.data.total_suara);
          $("#tim h1").html(res.data.total_tim);
          $("#pin h1").html(res.data.total_pin);

          $("#suara p span").html(res.data.target_suara);
          $("#tim p span").html(res.data.target_tim);
          $("#pin p span").html(res.data.target_pin);

          $("#suara .persentase_text").html(`${res.data.persentase_suara} %`);
          $("#tim .persentase_text").html(`${res.data.persentase_tim} %`);
          $("#pin .persentase_text").html(`${res.data.persentase_pin} %`);

          $("#suara .progress-bar").css(
            "width",
            `${res.data.persentase_suara}%`
          );

          $("#tim .progress-bar").css("width", `${res.data.persentase_tim}%`);
          $("#pin .progress-bar").css("width", `${res.data.persentase_pin}%`);
        }
      },
      error: function (xhr) {
        console.log(xhr);
      },
    });
  }

  push_select(url, element) {
    $.ajax({
      url: url,
      method: "GET",
      success: function (res) {
        $(element).html("");
        let html = "<option selected disabled>Pilih</option>";
        $.each(res.data, function (x, y) {
          html += `<option value="${y.id}">${y.value}</option>`;
        });
        $(element).html(html);
      },
      error: function (xhr) {
        alert("gagal");
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

  checkResult(url) {
    $.ajax({
      url: url,
      method: "GET",
      success: function (res) {
        let tmp_imk = 0;
        let imk = "";
        let height_ = 0;
        let nutrisi = "";
        let hb = "-";
        let postest = "";
        let pretest = "";
        if (res.status == true) {
          console.log(res);

          height_ = res.data.height / 100;
          height_ = height_ ** 2;
          tmp_imk = res.data.weight / height_;

          if (tmp_imk < 18.5) {
            imk = "Kurang";
          } else if (tmp_imk >= 18.5 && tmp_imk <= 22.9) {
            imk = "Normal";
          } else if (tmp_imk >= 23 && tmp_imk <= 29.9) {
            imk = "Gemuk";
          } else {
            imk = "Obesitas";
          }

          if (res.data.lila < 23.5) {
            nutrisi = "KEK";
          } else {
            nutrisi = "Normal";
          }

          if (res.data.sex == "P") {
            res.data.hemoglobin > 12 ? (hb = "Normal") : (hb = "Anemia");
          }

          if (res.data.postest > 12) {
            postest = "Pengetahuan baik";
          } else if (res.data.postest >= 8 && res.data.postest < 12) {
            postest = "Cukup";
          } else {
            postest = "Kurang";
          }

          if (res.data.pretest > 12) {
            pretest = "Pengetahuan baik";
          } else if (res.data.pretest >= 8 && res.data.pretest < 12) {
            pretest = "Cukup";
          } else {
            pretest = "Kurang";
          }

          $("#result-name").html(res.data.name);
          $("#result-nisn").html(res.data.nisn);
          $("#result-ttl").html(res.data.date_of_birth);
          $("#result-imk").html(imk);
          $("#result-lila").html(nutrisi);
          $("#result-hb").html(hb);
          $("#result-postest").html(postest);
          $("#result-pretest").html(pretest);
        }
      },
      error: function (xhr) {
        alert("gagal");
      },
    });
  }

  form_upload(params) {
    var myDropzone = new Dropzone(`#${params}`, {
      headers: {
        "X-CSRF-TOKEN": document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
      },
      url: "/suara/filestore", // Set the url for your upload script location
      paramName: "file", // The name that will be used to transfer the file
      maxFiles: 1,
      params: {
        type: params,
      },
      maxFilesize: 0.5, // MB
      addRemoveLinks: true,
      // accept: function (file, done) {
      //   if (file.name == "wow.jpg") {
      //     done("Naha, you don't.");
      //   } else {
      //     done();
      //   }
      // },
    });
  }

  upload() {
    Dropzone.autoDiscover = false;
    // Dropzone.options.demoform = false;
    let token = $('meta[name="csrf-token"]').attr("content");
    $(function () {
      var myDropzone = new Dropzone("div#dropzoneDragArea", {
        paramName: "file",
        url: "{{ route('student.store_file') }}",
        previewsContainer: "div.dropzone-previews",
        addRemoveLinks: true,
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        params: {
          _token: token,
        },
        // The setting up of the dropzone
        init: function () {
          var myDropzone = this;
          //form submission code goes here
          $("form[name='demoform']").submit(function (event) {
            //Make sure that the form isn't actully being sent.
            event.preventDefault();
            URL = $("#demoform").attr("action");
            formData = $("#demoform").serialize();
            $.ajax({
              type: "POST",
              url: URL,
              data: formData,
              success: function (result) {
                if (result.status == "success") {
                  // fetch the useid
                  var student_id = result.student_id;
                  $("#student_id").val(student_id); // inseting student_id into hidden input field
                  //process the queue
                  myDropzone.processQueue();
                } else {
                  console.log("error");
                }
              },
            });
          });
          // this.on("sending", function (file, xhr, formData) {
          //   //fetch the student id from hidden input field and send that studentid with our image
          //   let student_id = document.getElementById("student_id").value;
          //   formData.append("student_id", student_id);
          // });  //Gets triggered when we submit the image.

          this.on("success", function (file, response) {
            alert("Student added successfully!!");
            location.reload();
          });
          this.on("queuecomplete", function () {});
        },
      });
    });
  }

  tabel_peringkat_referensi(type, id_kecamatan) {
    $.ajax({
      url: `/dashboard-ranking-referensi?type=${type}&id=${id_kecamatan}`,
      type: "GET",
      success: function (res) {
        console.log(res);
        let row = "";
        if (res.success) {
          let id = "";
          let label_lokasi = "";
          let jumlah_tim = 0;
          let jumlah_pin = 0;
          $.each(res.data, function (index, value) {
            jumlah_tim += value.jumlah_tim;
            jumlah_pin += value.jumlah_pin;
            if (value.type == "kecamatan") {
              id = value.id_kecamatan;
              label_lokasi = value.kecamatan;
            } else if (value.type == "kelurahan") {
              id = value.id_desa;
              label_lokasi = value.kelurahan.kelurahan;
            }

            if (value.type == "kecamatan" || value.type == "kelurahan") {
              row += `<tr>
                <td>${index + 1}</td>
                <td> <u><a href="/dashboard-admin?type=${
                  value.type
                }&id=${id}&nama=${label_lokasi}">${label_lokasi}</a></u> </td>
                <td> <div class="box-progress box-${value.persen_tim.color}-bg">
                  <span class="item-progress item-${
                    value.persen_tim.color
                  }-bg" style="width:${value.persen_tim.persentase}%"></span>
                  <p style="position:absolute">${value.capaian_tim} of ${
                value.target_tim
              }</p>
              <p style="position:absolute;margin-left: 125px;">${
                value.persen_tim.persentase
              }%</p>
                </div> </td>
              <td> <div class="box-progress box-${value.persen_pin.color}-bg">
                  <span class="item-progress item-${
                    value.persen_pin.color
                  }-bg" style="width:${value.persen_pin.persentase}%"></span>
                  <p style="position:absolute">${value.capaian_pin} of ${
                value.target_pin
              }</p>
              <p style="position:absolute;margin-left: 116px;">${
                value.persen_pin.persentase
              }%</p>
                </div> </td>
              <td> <div class="box-progress box-${value.persen_suara.color}-bg">
                  <span class="item-progress item-${
                    value.persen_suara.color
                  }-bg" style="width:${value.persen_suara.persentase}%"></span>
                  <p style="position:absolute">${value.capaian_suara} of ${
                value.target_suara
              }</p>
              <p style="position:absolute;margin-left: 154px;">${
                value.persen_suara.persentase
              }%</p>
                </div> </td>
              <tr>`;
            } else {
              row += `<tr>
                    <td>${index + 1}</td>
                    <td> ${value.tps} </td>
                    <td> ${value.jumlah_tim} </td>
                  <td> ${value.jumlah_pin} </td>
                  <td> ${value.jumlah_suara} </td>
                  <tr>`;
            }
          });
          if (res.data.length > 0) {
            if (res.data[0]["type"] === "tps") {
              $("#tim h1").html(jumlah_tim);
              $("#pin h1").html(jumlah_pin);
            }
          }
          $("#peringkat-referensi tbody").html(row);
        }
      },
      error: function (xhr) {
        console.log(xhr);
      },
    });
  }

  dragDrop() {
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
      const dropZoneElement = inputElement.closest(".drop-zone");

      dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
      });

      inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
          updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
      });

      dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
      });

      ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
          dropZoneElement.classList.remove("drop-zone--over");
        });
      });

      dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
          inputElement.files = e.dataTransfer.files;
          updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
      let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

      // First time - remove the prompt
      if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
      }

      if (dropZoneElement.querySelector(".img-promt")) {
        dropZoneElement.querySelector(".img-promt").remove();
      }

      // First time - there is no thumbnail element, so lets create it
      if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
      }

      thumbnailElement.dataset.label = file.name;

      // Show thumbnail for image files
      if (file.type.startsWith("image/")) {
        const reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = () => {
          thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
        };
      } else {
        thumbnailElement.style.backgroundImage = null;
      }
    }
  }
}
